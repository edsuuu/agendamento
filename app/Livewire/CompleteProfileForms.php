<?php

namespace App\Livewire;

use App\Models\Business;
use App\Models\SegmentTypes;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CompleteProfileForms extends Component
{
	public $formData = [
		'commerceName' => '',
		'segmentType' => '',
		'phone' => '',
		'password' => '',
		'password_confirmation' => '',
	];
	
	public $segmentsTypes = [];
	
	public function mount()
	{
		$this->segmentsTypes = SegmentTypes::orderBy('name', 'asc')->get();
	}
	
	public function handleChange($field)
	{
		$this->resetErrorBag($field);
	}
	
	
	public function handlePhoneChange($field)
	{
		$this->formatPhone();
		
		$this->handleChange($field);
	}
	
	public function formatPhone()
	{
		$cleaned = preg_replace('/\D/', '', $this->formData['phone']);
		
		if (strlen($cleaned) <= 10) {
			$formatted = preg_replace('/(\d{2})(\d{4})(\d{0,4})/', '($1) $2-$3', $cleaned);
		} else {
			$formatted = preg_replace('/(\d{2})(\d{5})(\d{0,4})/', '($1) $2-$3', $cleaned);
		}
		
		$this->formData['phone'] = $formatted;
	}
	
	public function submitForm()
	{
		$this->validate([
			'formData.commerceName' => 'required|string|max:255',
			'formData.segmentType' => 'required',
			'formData.phone' => 'required|regex:/^\(\d{2}\) \d{4,5}-\d{4}$/',
			'formData.password' => 'required|string|min:8|confirmed|regex:/[A-Z]/|regex:/[\W_]/',
			'formData.password_confirmation' => 'required|string|min:8',
		], [
			'formData.commerceName.required' => 'O nome do comércio é necessário.',
			'formData.segmentType.required' => 'Selecione um tipo de segmento.',
			'formData.phone.required' => 'Por favor, insira um número de telefone.',
			'formData.phone.regex' => 'O número de telefone deve estar no formato (DDD) 98765-4321.',
			'formData.password.required' => 'A senha é obrigatória.',
			'formData.password.confirmed' => 'As senhas não coincidem.',
			'formData.password.regex' => 'A senha deve conter pelo menos uma letra maiúscula e um caractere especial.',
			'formData.password_confirmation.required' => 'A confirmação de senha é obrigatória.',
		]);
		
		$user = auth()->user();
		
		try {
			$user->update([
				'phone' => $this->formData['phone'],
				'password' => Hash::make($this->formData['password']),
			]);
			
			Business::create([
				'name' => $this->formData['commerceName'],
				'segment_type_id' => $this->formData['segmentType'],
				'id_user' => $user->id,
			]);
			
			session()->flash('message', 'Cadastro atualizado com sucesso!');
			
			return redirect()->route('business.dashboard');
		} catch (\Exception $e) {
			dd($e->getMessage());
		}
	}
	
	
	public function render()
	{
		return view('livewire.complete-profile-forms');
	}
	
	
}
