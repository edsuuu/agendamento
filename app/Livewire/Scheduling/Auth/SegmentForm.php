<?php

namespace App\Livewire\Scheduling\Auth;

use App\Models\Segments;
use App\Models\SegmentTypes;
use Livewire\Component;

class SegmentForm extends Component
{
    public $segments = [];
    public $segmentTypes = [];
    public $selectedSegment = null;
    public function mount(): void
    {
        $this->segments = Segments::all();
    }

    public function update(): void
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
