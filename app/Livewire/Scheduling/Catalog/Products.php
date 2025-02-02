<?php

namespace App\Livewire\Scheduling\Catalog;

use Livewire\Attributes\On;
use Livewire\Component;

class Products extends Component
{
    public $openModal = false;

    #[On('closeModalProduct')]
    public function openAndCloseModal()
    {
        $this->openModal = !$this->openModal;
    }

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.scheduling.catalog.products');
    }
}
