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
	
	public function submitForm()
	{
		$this->validate([
			'formData.commerceName' => 'required|string|max:255',
			'formData.segmentType' => 'required',
			'formData.phone' => 'required|string|min:10|max:15',
			'formData.password' => 'required|string|min:8|confirmed',
			'formData.password_confirmation' => 'required|string|min:8',
		], [
			'formData.commerceName.required' => 'O nome do comércio é necessário.',
			'formData.segmentType.required' => 'Selecione um tipo de segmento.',
			'formData.phone.required' => 'Por favor, insira um número de telefone.',
			'formData.password.required' => 'A senha é obrigatória.',
			'formData.password.confirmed' => 'As senhas não coincidem.',
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
