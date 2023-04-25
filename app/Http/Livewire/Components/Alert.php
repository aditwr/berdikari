<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Alert extends Component
{
    public $type;
    public $message;
    public $desc;

    public $show = true;

    public function render()
    {
        return view('livewire.components.alert');
    }
}
