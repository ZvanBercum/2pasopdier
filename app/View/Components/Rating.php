<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Rating extends Component
{

    public $rated;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($rated)
    {
        $this->rated = $rated;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.rating');
    }
}
