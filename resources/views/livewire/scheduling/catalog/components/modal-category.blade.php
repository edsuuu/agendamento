<div x-data="{ openModal: true }"
     x-show="openModal"
     x-on:click="$wire.closeModal()"
     class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-20">

    <div x-on:click.stop class="bg-white p-4 rounded-lg shadow-lg w-[600px]">
        <div class="flex flex-col gap-4 ">
            <div class="flex flex-row justify-between">
                @if(!$idCategoryDelete)
                    <h1>{{ $idCategory ? "Editar Categoria" : "Criar uma Categoria" }}</h1>
                @else
                    <h1>Deseja mesmo apagar essa Categoria ? </h1>
                @endif

                <button wire:click="closeModal" class="bg-red-500 text-white rounded">
                    Fechar Modal
                </button>
            </div>

            @if(!$idCategoryDelete)
                <form wire:submit.prevent="save">
                    @csrf
                    <div class="flex flex-col gap-4">
                        <div class="flex flex-col border border-black">
                            <label for="flex flex-col gap-2 border-black">Nome</label>
                            <input type="text" class="border border-black" wire:model="name">
                            @error('name')
                            <span class="text-red-500 text-[13px]">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="border border-black">{{ $idCategory ? "Editar" : "Criar" }}</button>
                </form>
            @else
                <div>
                    <button wire:click="deleteCategory({{$idCategoryDelete}})" class="bg-red-500 text-white rounded">
                        Sim
                    </button>
                    <button wire:click="closeModal" class="bg-red-500 text-white rounded">
                        Não
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>



