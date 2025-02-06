<div x-data="{ openModal: true }"
     x-show="openModal"
     x-on:click="$wire.closeModal()"
     class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-20">

    <div x-on:click.stop class="bg-white p-4 rounded-lg shadow-lg w-[600px]">
        <div class="flex flex-col gap-4 ">
            <div class="flex flex-row justify-between">
                @if(!$idDelete)
                    <h1>{{ $id ? "Editar Produto" : "Criar um produto" }}</h1>
                @else
                    <h1>Deseja mesmo apagar esse Produto ? </h1>
                @endif

                <button wire:click="closeModal" class="bg-red-500 text-white rounded">
                    Fechar Modal
                </button>
            </div>

           @if(!$idDelete)
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

                        <div class="flex flex-col border border-black">
                            <label for="flex flex-col gap-2 border-black">Preço</label>
                            <input type="text" class="border border-black" oninput="this.value = formatMoney(this.value, 10)" wire:model="price">
                            @error('price')
                            <span class="text-red-500 text-[13px]">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex flex-col border border-black">
                            <label for="flex flex-col gap-2 border-black">Quantidade</label>
                            <input type="number" class="border border-black" wire:model="quantity">
                            @error('quantity')
                            <span class="text-red-500 text-[13px]">{{ $message }}</span>
                            @enderror
                        </div>

                        @if(count($categories) >= 1)
                            <div class="flex flex-col border border-black">
                                <label for="flex flex-col gap-2 border-black">Categoria</label>

                                <select name="categories" id="categories" class="border-black" wire:model="categorySelect">
                                    <option value="">Selecione uma Categoria</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>

                                @error('category')
                                <span class="text-red-500 text-[13px]">{{ $message }}</span>
                                @enderror
                            </div>
                        @else
                            <button wire:click="createNewCategory" class="border-gray-600">Cadastrar uma Nova Categoria</button>
                        @endif
                    </div>
                    <button type="submit" class="border border-black">{{ $id ? "Editar" : "Criar" }}</button>
                </form>
            @else
                <div>
                    <button wire:click="deleteProduct({{$idDelete}})" class="bg-red-500 text-white rounded">
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



