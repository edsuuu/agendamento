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
                <div
                    class="flex flex-col md:flex-row items-center justify-center max-w-full md:w-[500px] mx-auto space-y-4 md:space-y-0 md:space-x-4">
                    <div class="flex flex-col items-center text-center gap-1">
                    <span
                        class="flex items-center justify-center w-10 h-10 bg-white rounded-full dark:bg-blue-link shrink-0">
                        <svg class="w-4 h-4 text-blue-link dark:text-white" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M1 5.917 5.724 10.5 15 1.5"/>
                        </svg>
                    </span>
                        <p class="text-[14px] leading-4 text-white">Criando sua conta</p>
                    </div>
                    <li class="flex w-full items-center text-blue-link dark:text-blue-link after:content-[''] after:w-full after:h-0.5 after:border-b after:border-blue-link after:border-2 after:inline-block dark:after:text-blue-link">
                    </li>
                    <div class="flex flex-col items-center text-center gap-1">
                    <span
                        class="flex items-center justify-center w-10 h-10 bg-blue-link rounded-full  dark:bg-white shrink-0">
                        <svg class="w-5 h-5 text-gray-500 dark:text-blue-link" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                            <path
                                d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z"/>
                        </svg>
                    </span>
                        <p class="text-[14px] leading-4 text-white">Completando seu perfil</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full h-full">
        @if ($currentStep === 1)
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
                        {{ $currentStep === 4 ? 'disabled' : '' }}>
                        Continuar
                    </button>
                </div>
            </div>
        @elseif ($currentStep === 2)
            <div>
                Etapa 2: Informações de Contato
                <button
                    wire:click="previousStep"
                    class="btn btn-secondary"
                    {{ $currentStep === 1 ? 'disabled' : '' }}>
                    Voltar
                </button>
                <button
                    wire:click="nextStep"
                    class="bg-gray-600"
                    {{ $currentStep === 4 ? 'disabled' : '' }}>
                    Continuar
                </button>
            </div>
        @elseif ($currentStep === 3)
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
                    {{ $currentStep === 4 ? 'disabled' : '' }}>
                    Continuar
                </button>
            </div>
        @elseif ($currentStep === 4)
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
                    {{ $currentStep === 4 ? 'disabled' : '' }}>
                    Continuar
                </button>
            </div>
        @endif
    </div>
</div>

