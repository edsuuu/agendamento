<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;

class FormLogin extends Component
{
	public $formData = [
		'email' => '',
		'password' => '',
		'remember' => false,
	];

	public function handleChange($field): void
	{
		$this->resetErrorBag($field);
	}

	public function submit()
	{
		$this->validate([
			'formData.email' => 'required|email',
			'formData.password' => 'required',
		], [
			'formData.email.required' => 'Por favor, informe seu e-mail',
			'formData.email.email' => 'Por favor, insira um email válido',
			'formData.password.required' => 'Por favor, informe sua senha',
		]);

		if (Auth::check()) {
			$user = Auth::user();
			return redirect($this->redirectBasedOnRole($user));
		}

		$remember = (bool)$this->formData['remember'];

		try {

			$user = User::where('email', $this->formData['email'])->first();

			if (!$user) {
				return $this->addError('formData.email', 'Conta não encontrada.');
			}


			if (!Hash::check($this->formData['password'], $user->password)) {
				return $this->addError('formData.password', 'Senha inválida.');
			}

			Auth::login($user, $remember);

			session()->regenerate();

			return redirect($this->redirectBasedOnRole($user));

		} catch (\Exception $e) {
			 return $this->addError('formData', 'Ocorreu um erro ao tentar fazer login. Tente novamente.');
		}
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

	public function render()
	{
		return view('livewire.form-login');
	}
}
