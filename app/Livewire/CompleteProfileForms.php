<?php

namespace App\Livewire;

use Livewire\Component;

class CompleteProfileForms extends Component
{
	public $currentStep = 0;
	public $formData = [
		'commerceName' => '',
		'phone' => '',
		'password' => '',
		'password_confirmation' => '',
	];
	
	public function nextStep()
	{
		$this->validateStep();
		$this->currentStep++;
	}
	
	public function validateStep()
	{
		$rules = [];
		$messages = [
			'formData.commerceName.required' => 'O nome do comércio é necessário.',
			'formData.phone.required' => 'Por favor, insira um número de telefone.',
			'formData.password.required' => 'A senha é obrigatória.',
			'formData.password.confirmed' => 'As senhas não coincidem.',
			'formData.password_confirmation.required' => 'A confirmação de senha é obrigatória.',
		];
		
		if ($this->currentStep === 0) {
			$rules = ['formData.commerceName' => 'required|string|max:255'];
		} elseif ($this->currentStep === 1) {
			$rules = ['formData.phone' => 'required|string|min:10|max:15'];
		} elseif ($this->currentStep === 2) {
			$rules = [
				'formData.password' => 'required|string|min:8|confirmed',
				'formData.password_confirmation' => 'required|string|min:8',
			];
		}
		
		$this->validate($rules, $messages);
	}
	
	public function previousStep()
	{
		$this->currentStep--;
	}
	
	
	public function submitForm()
	{
		$this->validateStep();
		
		dd($this->formData);

//		session()->flash('message', 'Cadastro atualizado com sucesso!');
	}
	
	public function render()
	{
		return view('livewire.complete-profile-forms');
	}
}
