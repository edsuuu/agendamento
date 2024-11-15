<?php

namespace App\Livewire;

use App\Models\Segments;
use App\Models\SegmentTypes;
use Livewire\Component;

class SegmentForm extends Component
{
    public $segments = [];
    public $segmentTypes = [];
    public $selectedSegment = null;
    public function mount()
    {
        $this->segments = Segments::all();
    }

    public function update()
    {
        if ($this->selectedSegment) {
            $this->segmentTypes = SegmentTypes::where('id_segments', $this->selectedSegment)->get();
        }
    }

    public function render()
    {
        return view('livewire.segment-form');
    }
}
