<?php

namespace App\View\Components\Site;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardPlans extends Component
{
    /**
     * Create a new component instance.
     */

    public $title;
    public $prices;
    public $description;


    public function __construct($title, $prices, $description)
    {
        $this->title = $title;
        $this->prices = $prices;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.site.card-plans');
    }
}
