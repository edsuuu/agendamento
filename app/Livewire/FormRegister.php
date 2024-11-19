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
			'formData.firstName'=>'required|string|min:3|max:30',
			'formData.lastName'=>'string|min:3|max:30',
			'formData.nameBusiness'=>'required|string|min:3|max:30',
			'formData.phone'=>'required',
			'formData.email'=>'required',
			'formData.password'=>'required',
		], [
			'formData.firstName'=>'required',
			'formData.lastName'=>'required',
			'formData.nameBusiness'=>'required',
			'formData.phone'=>'required',
			'formData.email'=>'required',
			'formData.password'=>'required',
		]);
		dd($this->formData);
	}

    public function render()
    {
        return view('livewire.form-register');
    }
}
