<?php

namespace App\Livewire\Components;

use Livewire\Component;

class ButtonModal extends Component
{
    public $text, $component, $level, $params, $classList;

    public function mount($text = '', $component = '', $level = '', $params = '', $classList = '')
    {
        $this->text = $text;
        $this->component = $component;
        $this->level = $level;
        $this->params =  $params;
        $this->classList = $classList;
    }

    public function render()
    {
        return view('livewire.components.button-modal');
    }
}
