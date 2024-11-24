<?php

namespace App\Livewire;

use App\Models\Business;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class FormRegister extends Component
{

	public  $formData = [
		'firstName' => '',
		'lastName' => '',
		'nameBusiness' => '',
		'phone' => '',
		'email' => '',
		'password' => '',
	];

	public $permissionBusiness = 'costumer';

	public function submitRegister()
	{

		$this->validate([
			'formData.firstName' => 'required|string|min:3|max:30',
			'formData.lastName' => 'nullable|string|min:3|max:30',
			'formData.nameBusiness' => 'required|string|min:3|max:50',
			'formData.phone' => 'required|regex:/^\(?\d{2}\)?\s?\d{5}-?\d{4}$/',
			'formData.email' => [
				'required',
				'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
				'unique:users,email',
			],
			'formData.password' => 'required|min:6',
		], [
			'formData.firstName.required' => 'O nome é obrigatório.',
			'formData.firstName.min' => 'O nome deve ter no mínimo 3 caracteres.',
			'formData.firstName.max' => 'O nome pode ter no máximo 30 caracteres.',
			'formData.lastName.min' => 'O sobrenome deve ter no mínimo 3 caracteres.',
			'formData.lastName.max' => 'O sobrenome pode ter no máximo 30 caracteres.',
			'formData.nameBusiness.required' => 'O nome do comércio é obrigatório.',
			'formData.nameBusiness.min' => 'O nome do comércio deve ter no mínimo 3 caracteres.',
			'formData.nameBusiness.max' => 'O nome do comércio pode ter no máximo 50 caracteres.',
			'formData.phone.required' => 'O celular é obrigatório.',
			'formData.phone.regex' => 'O celular deve conter apenas números.',
			'formData.email.required' => 'O email é obrigatório.',
			'formData.email.regex' => 'O formato do email é inválido.',
			'formData.email.unique' => 'Este email já está cadastrado.',
			'formData.password.required' => 'A senha é obrigatória.',
			'formData.password.min' => 'A senha deve ter no mínimo 6 caracteres.',
		]);

        DB::beginTransaction();

        try {
			$user = User::create([
				'first_name' => $this->formData['firstName'],
				'last_name' => $this->formData['lastName'],
				'email' => $this->formData['email'],
				'phone' => '+55 ' . $this->formData['phone'],
				'password' => Hash::make($this->formData['password']),
				'role' => $this->permissionBusiness,
			]);

			Business::create([
			'name' => $this->formData['nameBusiness'],
			'id_user' => $user->id]);
            DB::commit();

            Auth::login($user);

            if(Auth::check()){
                return redirect()->route('business.profile-complete');
            }

            session()->flash('error', 'Erro ao autenticar usuário.');
            return redirect()->route('login');
        } catch (\Exception $e) {
            DB::rollBack();
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
		return view('livewire.form-register');
	}
}
