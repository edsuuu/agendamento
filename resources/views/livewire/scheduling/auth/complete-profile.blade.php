<div class="flex h-content flex-1 overflow-y-hidden">
    <div class="w-full h-full bg-blue-black">
        <div class="w-full flex flex-row">
            <div class="bg-blue-black w-full flex flex-col justify-evenly">
                <div class="flex flex-col gap-4 justify-center items-center text-white">
                    <div>
                        <h1 class="text-3xl font-medium">Seja Bem vindo, {{ auth()->user()->first_name }} !</h1>
                    </div>
                    <div class="text-center">
                        <p>
                            Vamos completar o seu perfil para você começar atender seus clientes.
                        </p>
                        <p>
                            E gerenciar seu negócio.
                        </p>
                    </div>
                </div>
                <ul class="space-y-4">
                    <li class="text-white {{ $currentStep === 1 ? 'font-bold' : '' }}">Etapa 1: Informações Básicas</li>
                    <li class="text-white {{ $currentStep === 2 ? 'font-bold' : '' }}">Etapa 2</li>
                    <li class="text-white {{ $currentStep === 3 ? 'font-bold' : '' }}">Etapa 3</li>
                    <li class="text-white {{ $currentStep === 4 ? 'font-bold' : '' }}">Etapa 4</li>
                </ul>
            </div>
        </div>
    </div>


    <div class="w-full h-full">
        @if ($currentStep === 1)
            <div class="h-full flex flex-col max-w-2xl m-auto gap-7">
                <div class="mt-28">
                    <h1 class="font-bold text-2xl">Informações Pessoais</h1>
                    <p>Para começar, é importante que você preencha seus dados </p>
                </div>



                @foreach($segmentsTypes as $s)
                    <p>{{$s}}</p>
                @endforeach
                <div class="border border-black w-full grid grid-cols-2 gap-4">
                        <h1>Nome do seu comercio</h1>
                        <h1>Numero de celular </h1>
                </div>
                <div>
                    <h1>Onde nos conheceu ?</h1>
                    <select name="" id="">
                        <option>Google</option>
                        <option>Instagram</option>
                        <option>Facebook</option>
                        <option>Amigo</option>
                        <option>Anuncio</option>
                    </select>

                </div>
                <div class="w-full">
                    <button
                        class="bg-blue-black w-full text-center rounded-[5px] p-3 text-white font-medium text-[16px] cursor-pointer"
                        wire:click="nextStep"
                        class="btn btn-secondary"
                        {{ $currentStep === 5 ? 'disabled' : '' }}>
                        Continuar
                    </button>
                </div>
            </div>
        @elseif ($currentStep === 2)
            <div class="h-full flex flex-col max-w-2xl m-auto gap-7">
                <div class="mt-28">
                    <h1 class="font-bold text-2xl">Com qual perfil você se encaixa</h1>
                    <p>Para começar, é importante que você escolha o modelo que mais se encaixa ao seu negócio</p>
                </div>
                <div class="border border-black w-full grid grid-cols-2 gap-4">
                    <div class="border border-black">
                        <h1>Trabalho sozinho</h1>
                        <p>Nao tenho funcionarios</p>
                    </div>
                    <div class="border border-black">
                        <h1>Micro Empresa</h1>
                        <p>Entre 1 a 4 funcionarios</p>
                    </div>
                    <div class="border border-black">
                        <h1>Pequena empresa</h1>
                        <p>Entre 4 a 10 funcionaarios</p>
                    </div>
                    <div class="border border-black">
                        <h1>Media ou grande empresa</h1>
                        <p>Acima de 10 funcionarios</p>
                    </div>
                    <div class="border border-black">
                        <h1>Rede ou franquia</h1>
                        <p>Sou uma rede ou franquia</p>
                    </div>
                </div>
                <div>
                    <h1>Onde nos conheceu ?</h1>
                    <select name="" id="">
                        <option>Google</option>
                        <option>Instagram</option>
                        <option>Facebook</option>
                        <option>Amigo</option>
                        <option>Anuncio</option>
                    </select>

                </div>
                <div class="w-full">
                    <button
                        class="bg-blue-black w-full text-center rounded-[5px] p-3 text-white font-medium text-[16px] cursor-pointer"
                        wire:click="nextStep"
                        class="btn btn-secondary"
                        {{ $currentStep === 5 ? 'disabled' : '' }}>
                        Continuar
                    </button>
                </div>
            </div>
        @elseif ($currentStep === 3)
           <div class="h-full flex flex-col max-w-2xl m-auto gap-7">
                Etapa 2: Informações de Contato

                <div class="rounded-lg flex items-center justify-center text-white border border-gray-400 w-full  p-6">
                    <form method="POST" wire:submit.prevent="submitForm" class="text-black w-full">
                        @csrf

                        {{-- Nome do Comércio--}}
                        <label class="block mb-4">
                            <span class="text-[15px] text-gray-700">Qual é o nome do seu comércio?</span>
                            <input type="text" name="commerceName" wire:model.defer="formData.commerceName"
                                   wire:change="handleChange('formData.commerceName')"
                                   class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1
				       focus:ring-blue-500"
                                   placeholder="Nome do comercio"
                            >
                            @error('formData.commerceName')
                            <span class="text-red-500 text-[13px]">{{ $message }}</span>
                            @enderror
                        </label>

                        {{--Tipo de Segmento--}}
                        <label for="segmentType" class="block mb-4">
                            <span class="text-[15px] text-gray-700">Selecione o tipo do seu segmento</span>
                            <select name="segmentType" wire:model.defer="formData.segmentType"
                                    wire:change="handleChange('formData.segmentType')"
                                    class="w-full border border-gray-300 cursor-pointer outline-none rounded-lg text-[14px]">
                                <option value="" disabled selected>Selecione um tipo de segmento</option>
                                @foreach($segmentsTypes as $segmentType)
                                    <option value="{{ $segmentType->id }}">{{ $segmentType->name }}</option>
                                @endforeach
                            </select>
                            @error('formData.segmentType')
                            <span class="text-red-500 text-[13px]">{{ $message }}</span>
                            @enderror
                        </label>

                        {{-- Telefone --}}
                        <label class="block mb-4">
                            <span class="text-[15px] text-gray-700">Cadastre um número de Telefone / Celular</span>
                            <input type="text" name="phone" wire:model.defer="formData.phone" wire:change="handlePhoneChange('formData.phone')"
                                   class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500"
                                   placeholder="(00) 98765-4321"
                                   maxlength="15"
                            >
                            @error('formData.phone')
                            <span class="text-red-500 text-[13px]">{{ $message }}</span>
                            @enderror
                        </label>

                        {{-- Nova Senha --}}
                        <div class="block mb-4">
                            <span class="text-lg font-bold mb-2">Cadastre uma nova senha:</span>
                            <label class="block mb-4">
                                <span class="text-[15px] text-gray-700">Sua nova senha</span>
                                <input type="password" name="password" wire:model.defer="formData.password"
                                       class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1
					       focus:ring-blue-500"
                                       maxlength="50"
                                       placeholder="********"
                                       wire:change="handleChange('formData.password')"
                                >
                                @error('formData.password')
                                <span class="text-red-500 text-[13px]">{{ $message }}</span>
                                @enderror
                            </label>

                            <label class="block mb-4">
                                <span class="text-[15px] text-gray-700">Confirme sua nova senha</span>
                                <input type="password" name="password_confirmation" wire:model.defer="formData.password_confirmation"
                                       class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1
					       focus:ring-blue-500"
                                       maxlength="50"
                                       placeholder="********"
                                       wire:change="handleChange('formData.password_confirmation')"
                                >
                                @error('formData.password_confirmation')
                                <span class="text-red-500 text-[13px]">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>

                        {{-- Botão de Enviar --}}
                        <button type="submit"
                                class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600 transition
			        transform:scale-[0.97]"
                        >
                            Enviar
                        </button>
                    </form>
                </div>


               <div class="w-full flex flex-row gap-10">
                   <button
                       class="bg-blue-black w-full text-center rounded-[5px] p-3 text-white font-medium text-[16px] cursor-pointer"
                       wire:click="previousStep"
                       class="btn btn-secondary"
                       {{ $currentStep === 1 ? 'disabled' : '' }}>
                       Voltar
                   </button>
                   <button
                       class="bg-blue-black w-full text-center rounded-[5px] p-3 text-white font-medium text-[16px] cursor-pointer"
                       wire:click="nextStep"
                       class="btn btn-secondary"
                       {{ $currentStep === 5 ? 'disabled' : '' }}>
                       Continuar
                   </button>
               </div>

            </div>
        @elseif ($currentStep === 4)
            <div>
                Etapa 3: Confirmação
                <button
                    wire:click="previousStep"
                    class="btn btn-secondary"
                    {{ $currentStep === 1 ? 'disabled' : '' }}>
                    Voltar
                </button>
                <button
                    wire:click="nextStep"
                    class="bg-gray-600"
                    {{ $currentStep === 5 ? 'disabled' : '' }}>
                    Continuar
                </button>
            </div>
        @elseif ($currentStep === 5)
            <div>
                Etapa 4: Finalização
                <button
                    wire:click="previousStep"
                    class="btn btn-secondary"
                    {{ $currentStep === 1 ? 'disabled' : '' }}>
                    Voltar
                </button>
                <button
                    wire:click="nextStep"
                    class="bg-gray-600"
                    {{ $currentStep === 5 ? 'disabled' : '' }}>
                    Continuar
                </button>
            </div>
        @endif
    </div>
</div>

