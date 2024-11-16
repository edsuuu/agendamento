<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Segments;
use App\Models\SegmentTypes;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PHPUnit\TextUI\Application;

class AuthController extends Controller
{
    private readonly Business $businessModel;
    private readonly User $userModel;

    private readonly string $costumerRole;
    // private readonly string $adminRole;
    private readonly string $userRole;

    public function __construct(Business $businessModel, User $userModel)
    {
        $this->businessModel = $businessModel;
        $this->userModel = $userModel;

       // $this->adminRole = 'admin';
        $this->costumerRole = 'costumer';
        $this->userRole = 'user';
    }

    public function index()
    {
        $segments = Segments::select('id', 'name')->get();

        return view('auth', compact('segments'));
    }

    public function getAllSegmentsTypeByIdTheSegment($segment_id)
    {
        $segmentsTypes = SegmentTypes::where('id_segments', $segment_id)->get();

        return response()->json($segmentsTypes);
    }

    public function loginForm(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            return redirect($this->redirectBasedOnRole($user));
        }

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O email é inválido.',
            'password.required' => 'O campo senha é obrigatório.',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            $message = 'conta não encontrada.';
            return back()->with('erro', $message);
        }

        if(Hash::check($credentials['password'], $user->password)) {
            $message = 'Senha invalida';
            return back()->with('erro', $message);
        }

//        dd($request->remember); retorna  "on"

        Auth::login($user, $request->remember);

        $request->session()->regenerate();

        return redirect($this->redirectBasedOnRole($user));
    }

    private function redirectBasedOnRole($user)
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

        $existingBusiness = $this->businessModel->where('id_user', $user->id)->first();

        if ($existingBusiness != null) {
            return redirect()->back()->withErrors(['business_exists' => 'Este usuário já possui um comércio cadastrado.']);
        }

        $this->businessModel->createBusiness(
            $validateData['businessname'],
            $user->id,
            $validateData['segmentType']
        );

        Auth::login($user);

        return redirect()->route('business.dashboard');
    }

    public function registerUser(Request $request)
    {
        $validateData = $request->validate([
            'firstname' => 'required|string|max:40',
            'lastname' => 'required|string|max:40',
            'email' => 'required|string|email|unique:users',
            'phone' => 'required|string|max:15',
            'password' => 'required|string|confirmed',
        ],
            [
                'firstname.required' => 'Nome é obrigatório.',
                'firstname.max' => 'Nome não pode ter mais de 40 caracteres.',
                'lastname.required' => 'Sobrenome é obrigatório.',
                'lastname.max' => 'Sobrenome não pode ter mais de 40 caracteres.',
                'email.required' => 'E-mail é obrigatório.',
                'email.email' => 'E-mail deve ser válido.',
                'email.unique' => 'Este e-mail já está cadastrado.',
                'phone.required' => 'O número de telefone é obrigatório.',
                'password.required' => 'A senha é obrigatória.',
                'password.confirmed' => 'As senhas não coincidem.',
            ]);


        $user = $this->storeUser(
            $validateData['firstname'],
            $validateData['lastname'],
            $validateData['email'],
            $validateData['phone'],
            $validateData['password'],
            $this->userRole
        );


        Auth::login($user);

        return redirect()->route('client.dashboard');
    }

    private function storeUser($firstname, $lastname, $email, $phone, $password, $role)
    {

        $hashPasswd = Hash::make($password);

        $data = $this->userModel->createUser($firstname, $lastname, $email, $phone, $hashPasswd, $role);

//        dd($data);

        return $data;
    }

    public function logout(Request $request): Application|RedirectResponse|Redirector
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $cookie = cookie('remember_token', '', -1);

        return redirect('/')->withCookie($cookie);
    }


    public function loginGoogle()
    {
    }
}
