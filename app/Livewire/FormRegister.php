<?php

namespace App\Livewire;

use Livewire\Component;

class FormRegister extends Component
{

	public $formData = [
		'firstName'=>'',
		'lastName'=>'',
		'nameBusiness'=>'',
		'phone'=>'',
		'email'=>'',
		'password'=>'',
	];

	public function submitRegister(){

        $this->validate([
            'formData.firstName' => 'required|string|min:3|max:30',
            'formData.lastName' => 'nullable|string|min:3|max:30',
            'formData.nameBusiness' => 'required|string|min:3|max:50',
            'formData.phone' => 'required|numeric|digits_between:10,15',
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
            'formData.phone.numeric' => 'O celular deve conter apenas números.',
            'formData.phone.digits_between' => 'O celular deve ter entre 10 e 15 dígitos.',
            'formData.email.required' => 'O email é obrigatório.',
            'formData.email.regex' => 'O formato do email é inválido.',
            'formData.email.unique' => 'Este email já está cadastrado.',
            'formData.password.required' => 'A senha é obrigatória.',
            'formData.password.min' => 'A senha deve ter no mínimo 6 caracteres.',
        ]);


		dd($this->formData);
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
