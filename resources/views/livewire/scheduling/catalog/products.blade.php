<div class="flex flex-col gap-4">
    <div class="flex flex-row justify-between">
        <h1 class="text-2xl font-bold">{{$viewCategory ? "Categorias" : "Produtos"}}</h1>


        <button class="bg-blue-black text-white p-2 rounded" wire:click="viewCategoriesAndProducts">
            Ver {{$viewCategory ? "Produtos" : "Categorias"}}</button>

        <div>
            <button class="bg-blue-black text-white p-2 rounded" wire:click="openAndCloseModalCategory">Criar
                Categoria
            </button>

            <button class="bg-blue-black text-white p-2 rounded" wire:click="openAndCloseModal">Criar novo produto
            </button>
        </div>

    </div>

    @if ($viewCategory)
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nome
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Quantidade de Produtos por Categoria
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ação
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $category->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $category->products->count() }}
                        </td>
                        <td class="px-6 py-4">
                            <button wire:click="openAndCloseModalCategory({{ $category->id }})"
                                    class="text-blue-600 hover:underline">
                                Editar
                            </button>
                            <button wire:click="openAndCloseModalCategory(null, {{ $category->id }})"
                                    class="text-red-600 hover:underline">
                                Apagar
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $categories->links() }}
            </div>
        </div>
    @else
        <div class="">
            <div class="w-full bg-gray-300 flex flex-row justify-between">
                <input type="search" placeholder="Pesquisar Nome" wire:model.blur.change="searchProduct"/>
            </div>

            {{--        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">--}}
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nome
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Preço
                            <a href="#">
                                <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg>
                            </a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Quantidade
                            <a href="#">
                                <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg>
                            </a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Categoria
                            <a href="#">
                                <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg>
                            </a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Ação
                        </div>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $product->name }}
                        </th>
                        <td class="px-6 py-4">
                            R$ {{ number_format($product->price, 2,  ',' , '.') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $product->quantity }}
                        </td>
                        <td class="px-6 py-4">
                            {{$product->category->name ?? ''}}
                        </td>
                        <td class="px-6 py-4 ">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                               wire:click.prevent="openAndCloseModal({{ $product->id }})">Editar</a>
                            <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline"
                               wire:click.prevent="openAndCloseModal(null , {{$product->id}})">Apagar</a>
                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>
            <div class="mt-2">
                {{ $products->links() }}
            </div>
        </div>
    @endif


    {{--    </div>--}}

    @if($openModal)
        <livewire:scheduling.catalog.components.modal-product :idProduct="$selectedProductForEdit"
                                                              :idDelete="$selectedProductForDelete"/>
    @endif

    @if($openModalCategory)
        <livewire:scheduling.catalog.components.modal-category :idCategory="$selectedCategoryForEdit"
                                                               :idDelete="$selectedCategoryForDelete"/>
    @endif
</div>
