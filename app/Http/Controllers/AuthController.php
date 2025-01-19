<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\User;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use PHPUnit\TextUI\Application;

class AuthController extends Controller
{
    private readonly string $costumerRole;
    // private readonly string $adminRole;
    private readonly string $userRole;

    public function __construct()
    {
        // $this->adminRole = 'admin';
        $this->costumerRole = 'costumer';
        $this->userRole = 'user';
    }

    private function redirectBasedOnRole($user): string
    {
        if ($user->role === 'admin') {
            return route('admin.dashboard');
        } elseif ($user->role === 'costumer') {
            return route('business.dashboard');
        } elseif ($user->role === 'user') {
			return route('client.dashboard');
		}

		return route('home');
	}
    public function googleAuth(Request $request)
    {
        session(['business' => $request->get('business')]);

        if (Auth::check()) {
            $user = Auth::user();
            return redirect($this->redirectBasedOnRole($user));
        }

        return Socialite::driver('google')->redirect();
    }

    public function googleCallback(Request $request)
    {
        try {

            $business = session('business');

            $googleUser = Socialite::driver('google')->stateless()->user();

//            dd($googleUser);

            $user = User::where('email', $googleUser->getEmail())->first();

            if(!$user){
                $user = User::create([
                    'first_name' => $googleUser->user['given_name'],
                    'last_name' => $googleUser->user['family_name'] ?? null,
                    'email' => $googleUser->user['email'],
                    'google_id' => $googleUser->user['id'],
                    'photo' => $googleUser->user['picture'],
                    'email_verified_at' => now(),
                    'password' => Hash::make(Str::random(16)),
                    'role' => $business ? $this->costumerRole : $this->userRole,
                ]);

            } else {
                $user->update([
                    'google_id' => $googleUser->user['id'],
                    'photo' => $googleUser->user['picture'],
                    'emailsite.home_verified_at' => now(),
                ]);
            }

            Auth::login($user, 'on');

            if($user->role === $this->costumerRole){
                $businessId = Business::where('id_user', $user->id)->value('id');
//                dd($businessId);
                if($businessId){
                    return redirect($this->redirectBasedOnRole($user));
                } else {
                    return redirect()->route('business.complete-profile.google');
                }
            }

            return redirect($this->redirectBasedOnRole($user));
//            dd($googleUser);
        }  catch (ClientException $e) {
	        return redirect()->route('auth')->withErrors(['google' => 'Erro ao autenticar com Google. Por favor, tente novamente.']);
        } catch (\Exception $e) {
	        return redirect()->route('auth')->withErrors(['error' => 'Ocorreu um erro inesperado. Tente novamente.']);
        }
    }



    public function registerBusiness(Request $request)
    {
        $validateData = $request->validate([
            'firstname' => 'required|string|max:40',
            'lastname' => 'required|string|max:40',
            'businessname' => 'required|string|max:60',
            'email' => 'required|string|email|unique:users',
            'phone' => 'required|string|max:15',
            'password' => 'required|string|confirmed',
            'segmentType' => 'required',
        ],
            [
                'firstname.required' => 'Nome é obrigatório.',
                'firstname.max' => 'Nome não pode ter mais de 40 caracteres.',
                'lastname.required' => 'Sobrenome é obrigatório.',
                'lastname.max' => 'Sobrenome não pode ter mais de 40 caracteres.',
                'businessname.required' => 'O nome do comércio é obrigatório.',
                'businessname.max' => 'Nome do comércio não pode ter mais de 60 caracteres.',
                'email.required' => 'E-mail é obrigatório.',
                'email.email' => 'E-mail deve ser válido.',
                'email.unique' => 'Este e-mail já está cadastrado.',
                'phone.required' => 'O número de telefone é obrigatório.',
                'password.required' => 'A senha é obrigatória.',
                'password.confirmed' => 'As senhas não coincidem.',
            ]);

//        dd($validateData);

        $user = $this->storeUser(
            $validateData['firstname'],
            $validateData['lastname'],
            $validateData['email'],
            $validateData['phone'],
            $validateData['password'],
            $this->costumerRole
        );

//        dd($idUser);

        $existingBusiness = Business::where('id_user', $user->id)->first();

        if ($existingBusiness != null) {
            return redirect()->back()->withErrors(['business_exists' => 'Este usuário já possui um comércio cadastrado.']);
        }

        Business::createBusiness(
            $validateData['businessname'],
            $user->id,
            $validateData['segmentType']
        );

        Auth::login($user);

        return redirect()->route('business.dashboard');
    }

    private function storeUser($firstname, $lastname, $email, $phone, $password, $role)
    {

        $hashPasswd = Hash::make($password);

        $data = User::createUser($firstname, $lastname, $email, $phone, $hashPasswd, $role);

//        dd($data);

        return $data;
    }

    public function deleteUserInCompletedDataUserByGoogle(Request $request)
    {
	    $cookie = null;

	    if (Auth::check()) {
		    $idUser = auth()->user()->id;

		    $deleted = User::where('id', $idUser)->delete();

		    if ($deleted) {
			    Auth::logout();

			    $request->session()->invalidate();
			    $request->session()->regenerateToken();

			    $cookie = cookie('remember_token', '', -1);
		    }
	    }

	    if ($cookie) {
		    return redirect('auth')->withCookie($cookie);
	    }

	    return redirect('auth');
    }
}
