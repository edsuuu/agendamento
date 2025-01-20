<?php

namespace App\Livewire\Scheduling\Auth;

use App\Models\Business;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class FormRegister extends Component
{
	public $formData = [
        'firstName' => '',
        'lastName' => '',
        'nameBusiness' => '',
        'phone' => '',
        'email' => '',
        'password' => '',
    ];

	public function save()
	{
        $validatedData = $this->validate([
            'formData.firstName' => 'required|string|min:3|max:255',
            'formData.lastName' => 'nullable|string|min:3|max:255',
            'formData.nameBusiness' => 'required|string|min:3|max:50',
            'formData.phone' => 'required',
            'formData.email' => 'required|email:rfc,dns|unique:users,email',
            'formData.password' => 'required|min:6',
        ], [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute deve ter pelo menos :min caracteres.',
            'max' => 'O campo :attribute deve ter no máximo :max caracteres.',
            'unique' => 'O campo :attribute já está cadastrado.',
            'regex' => 'O campo :attribute tem um formato inválido.',
        ], [
            'formData.firstName' => 'Nome',
            'formData.lastName' => 'Sobrenome',
            'formData.nameBusiness' => 'Nome da Empresa',
            'formData.phone' => 'Telefone',
            'formData.email' => 'E-mail',
            'formData.password' => 'Senha',
        ]);

        DB::beginTransaction();

        try {
			$user = User::create([
				'first_name' => $validatedData['formData']['firstName'],
				'last_name' => $validatedData['formData']['lastName'],
				'email' => $validatedData['formData']['email'],
				'phone' => '+55 ' . $validatedData['formData']['phone'],
				'password' => Hash::make($validatedData['formData']['password']),
				'role' => 'customer',
			]);

			Business::create([
			'name' => $validatedData['formData']['nameBusiness'],
			'user_id' => $user->getAttributes()['id']
            ]);

            DB::commit();

            Auth::login($user);

            if(Auth::check()){
                sleep(1);
                return redirect()->route('business.profile-complete');
            }

            session()->flash('error', 'Erro ao autenticar usuário.');
            return redirect()->route('login');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('daily')->debug('Erro ao tentar criar uma conta' . $e->getMessage());
            session()->flash('error', 'Erro ao criar a conta. Por favor, tente novamente mais tarde.');
            return redirect()->back();
        }
	}

	public function handleChange($field): void
	{
		$this->resetErrorBag($field);
	}

	public function render()
	{
		return view('livewire.scheduling.auth.form-register');
	}
}
