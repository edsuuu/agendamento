<?php

namespace App\Livewire;

use Livewire\Component;

class AuthForms extends Component
{
    public $swapPositions = false;

    public function togglePositions()
    {
        $this->swapPositions = !$this->swapPositions;
    }

    public function render()
    {
        return view('livewire.auth-forms');
    }
}
