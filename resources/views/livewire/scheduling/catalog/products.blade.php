<div class="flex flex-col gap-4 border border-black">
    <div class="flex flex-row justify-between border border-black">
        <h1 class="text-2xl font-bold">Produtos</h1>

        <button class="bg-blue-black text-white p-2 rounded" wire:click="openAndCloseModal">Criar novo produto</button>
    </div>

    <div class="border border-black">
        teste

    </div>



    @if($openModal)
       <livewire:scheduling.catalog.components.modal-product :id="1" />
    @endif
</div>
