<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    public $label;
    public $id;
    public $name;

    public function __construct(
        $label = 'Label',
        $id = 'select_field',
        $name = 'select_field',
    ) {
        $this->label = $label;
        $this->id = $id;
        $this->name = $name;
    }

    public function render()
    {
        return view('components.select');
    }
}
