<?php

namespace App\Livewire;

use Livewire\Component;

class FormLogin extends Component
{
	public $formData = [
		'email' => '',
		'password' => '',
		'remember' => false,
	];
	
	public function handleChange($field)
	{
		$this->resetErrorBag($field);
	}
	
	public function submit(){
		$this->validate([
			'formData.email' => 'required|email',
			'formData.password' => 'required',
		], [
			'formData.email.required' => 'Por favor, informe seu e-mail',
			'formData.email.email' => 'Por favor, insira um email válido',
			'formData.password.required' => 'Por favor, informe sua senha',
		]);
		
		$remember = (bool)$this->formData['remember'];
		
		dd($remember);
		
		try {
		
		}catch (\Exception $e){
			dd($e->getMessage());
		}
	}
	
    public function render()
    {
        return view('livewire.form-login');
    }
}
