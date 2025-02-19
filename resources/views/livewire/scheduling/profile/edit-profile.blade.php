<div>
    <h2>
        {{ __('Informações de Perfil') }}
    </h2>

    <div>
        <div class="text-black flex flex-col gap-0.5">
            <p class="text-gray-700 text-[14px] font-medium">Nome</p>
            <input type="text" name="name" placeholder="Nome da nova categoria"
                   wire:model="name"
                   class="border border-gray-300 outline-none p-2 pl-3 rounded focus:border-blue-link  @error('name') border-red-500 @enderror"
                   maxlength="20">
            @error('name')
            <span class="text-red-500 text-[13px]">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div>
        <div class="text-black flex flex-col gap-0.5">
            <p class="text-gray-700 text-[14px] font-medium">Senha Atual</p>
            <input type="text" name="name" placeholder="Nome da nova categoria"
                   wire:model="name"
                   class="border border-gray-300 outline-none p-2 pl-3 rounded focus:border-blue-link  @error('name') border-red-500 @enderror"
                   maxlength="20">
            @error('name')
            <span class="text-red-500 text-[13px]">{{ $message }}</span>
            @enderror
        </div>

        <div class="text-black flex flex-col gap-0.5">
            <p class="text-gray-700 text-[14px] font-medium">Nova senha</p>
            <input type="text" name="name" placeholder="Nome da nova categoria"
                   wire:model="name"
                   class="border border-gray-300 outline-none p-2 pl-3 rounded focus:border-blue-link  @error('name') border-red-500 @enderror"
                   maxlength="20">
            @error('name')
            <span class="text-red-500 text-[13px]">{{ $message }}</span>
            @enderror
        </div>

        <div class="text-black flex flex-col gap-0.5">
            <p class="text-gray-700 text-[14px] font-medium">Confirme sua senha</p>
            <input type="text" name="name" placeholder="Nome da nova categoria"
                   wire:model="name"
                   class="border border-gray-300 outline-none p-2 pl-3 rounded focus:border-blue-link  @error('name') border-red-500 @enderror"
                   maxlength="20">
            @error('name')
            <span class="text-red-500 text-[13px]">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
