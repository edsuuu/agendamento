<?php

namespace App\Livewire\Scheduling;

use App\Livewire\Actions\Logout;
use Livewire\Component;

class NavbarGuest extends Component
{
    public function logout(Logout $logout): void
    {
        $logout();
        $this->redirect('/');
    }
    public function render()
    {
        return view('livewire.scheduling.navbar-guest');
    }
}
