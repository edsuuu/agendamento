<div x-data="{ openModal: true }"
     x-show="openModal"
     x-on:click="$wire.closeModal()"
     class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-20">

    <div x-on:click.stop class="bg-white p-4 rounded-lg shadow-lg w-[600px]">
       <div class="flex flex-col gap-4 ">
           <div class="flex flex-row justify-between">
               <h1>Criar um produto</h1>
               <button wire:click="closeModal" class="bg-red-500 text-white rounded">
                   Fechar Modal
               </button>
           </div>

           <div class="flex flex-col gap-4">
               <div class="flex flex-col border border-black">
                   <label for="flex flex-col gap-2 border-black">Nome</label>
                   <input type="text" class="border border-black">
               </div>

               <div class="flex flex-col border border-black">
                   <label for="flex flex-col gap-2 border-black">Preço</label>
                   <input type="text" class="border border-black">
               </div>

               <div class="flex flex-col border border-black">
                   <label for="flex flex-col gap-2 border-black">Categoria</label>

                   <select name="" id="" class="border-black">
                       <option>Categoria 1</option>
                       <option>Categoria 2</option>
                       <option>Categoria 3</option>
                       <option>Categoria 4</option>
                   </select>
               </div>
           </div>


           <button class="border border-black" wire:click="save">Criar</button>
       </div>
    </div>
</div>
