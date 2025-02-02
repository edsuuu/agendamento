<?php

namespace App\Livewire\Scheduling\Catalog\Components;

use Livewire\Component;

class  ModalProduct extends Component
{
    public $id;

    public function mount($id = null)
    {
        if ($id) {
            $this->id = $id;
        }
    }

    public function closeModal()
    {
        $this->dispatch('closeModalProduct');
    }

    public function save()
    {
        if ($this->id) {
            $this->closeModal();
        } else {
            $this->closeModal();
        }

    }

    public function render()
    {
        return view('livewire.scheduling.catalog.components.modal-product');
    }
}
