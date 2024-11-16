<?php

namespace App\Livewire;

use Livewire\Component;

class AuthForms extends Component
{
    public $swapForms = false;

    public function togglePositions()
    {
        $this->swapForms = !$this->swapForms;
    }

    public function render()
    {
        return view('livewire.auth-forms');
    }
}
