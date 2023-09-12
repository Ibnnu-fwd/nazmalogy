<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FileUpload extends Component
{
    public $label;
    public $id;
    public $type;
    public $help;
    public $name;

    public function __construct($label, $id, $type = 'file', $help = null, $name = null)
    {
        $this->label = $label;
        $this->id    = $id;
        $this->type  = $type;
        $this->help  = $help;
        $this->name  = $name;
    }

    public function render()
    {
        return view('components.file-upload');
    }
}
