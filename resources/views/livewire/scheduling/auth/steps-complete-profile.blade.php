<div class="flex w-full h-screen">
    <div class="w-full h-full bg-blue-black">
        <ul class="space-y-4">
            <li class="text-white {{ $currentStep === 1 ? 'font-bold' : '' }}">Etapa 1: Informações Básicas</li>
            <li class="text-white {{ $currentStep === 2 ? 'font-bold' : '' }}">Etapa 2</li>
            <li class="text-white {{ $currentStep === 3 ? 'font-bold' : '' }}">Etapa 3</li>
            <li class="text-white {{ $currentStep === 4 ? 'font-bold' : '' }}">Etapa 4</li>
        </ul>
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
