<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    

    public function __construct(public $type = 'text',public $nom,public $class,public $value = null, public $label)
    {
        $this->label = ucfirst($nom);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
