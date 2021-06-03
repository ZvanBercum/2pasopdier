<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ItemCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $item;
    public $type;
    public $mode;

    public function __construct($item, $type, $mode)
    {
        $this->item = $item;
        $this->type = $type;
        $this->mode = $mode;
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.item-card');
    }
}
