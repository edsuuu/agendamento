<div class="flex flex-col items-center justify-center h-full" id="content">
	<div class="rounded-lg flex items-center justify-center text-white border border-black w-full max-w-md p-6 bg-gray-100">
		@if ($currentStep === 0)
			<div class="text-black w-full">
				<label class="block mb-4">
					<span class="text-sm text-gray-700">Qual é o nome do seu comércio?</span>
					<input type="text" wire:model.defer="formData.commerceName" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
					@error('formData.commerceName')
					<span class="text-red-500 text-sm">{{ $message }}</span>
{{--					@dd($message)--}}
					@enderror
				</label>
				
				@livewire('segment-form')
			</div>
		@elseif ($currentStep === 1)
			<div class="text-black w-full">
				<label class="block mb-4">
					<span class="text-sm text-gray-700">Cadastre um número de Telefone / Celular</span>
					<input type="text" wire:model.defer="formData.phone"
					       class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
					@error('formData.phone')
					<span class="text-red-500 text-sm">{{ $message }}</span>
					@enderror
				</label>
			</div>
		@elseif ($currentStep === 2)
			<div class="text-black w-full">
				<p class="mb-4 text-lg font-bold">Cadastre uma nova senha:</p>
				<label class="block mb-4">
					<span class="text-sm text-gray-700">Sua nova senha</span>
					<input type="password" wire:model.defer="formData.password"
					       class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
					@error('formData.password')
					<span class="text-red-500 text-sm">{{ $message }}</span>
					@enderror
				</label>
				<label class="block mb-4">
					<span class="text-sm text-gray-700">Confirme sua nova senha</span>
					<input type="password" wire:model.defer="formData.password_confirmation"
					       class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
					@error('formData.password_confirmation')
					<span class="text-red-500 text-sm">{{ $message }}</span>
					@enderror
				</label>
			</div>
		@endif
	</div>
	
	<div class="flex space-x-4 mt-6">
		<button
				wire:click="previousStep"
				class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg disabled:opacity-50"
				@if ($currentStep === 0) disabled @endif>
			Voltar
		</button>
		<button
				wire:click="nextStep"
				class="px-4 py-2 bg-blue-500 text-white rounded-lg disabled:opacity-50 hover:bg-blue-600">
			@if ($currentStep === 2)
				Atualizar Cadastro
			@else
				Prosseguir
			@endif
		</button>
	</div>
</div>