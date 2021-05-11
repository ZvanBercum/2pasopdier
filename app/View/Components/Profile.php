<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Profile extends Component
{

    public $subject;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($subject)
    {
        $this->subject = $subject;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.profile');
    }
}
