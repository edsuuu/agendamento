<?php

namespace App\Livewire\Scheduling\Auth;

use Livewire\Component;

class StepsCompleteProfile extends Component
{

    public int $currentStep = 1;

    public function nextStep()
    {
        $this->currentStep++;
    }

    public function previousStep()
    {
        $this->currentStep--;
    }
    public function render()
    {
        return view('livewire.steps-complete-profile');
    }
}
