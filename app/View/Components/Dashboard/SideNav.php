<?php

namespace App\View\Components\Dashboard;

use App\Models\Keuangan;
use Illuminate\View\Component;

class SideNav extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getTipeKeuangan()
    {
        return Keuangan::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $keuangans = $this->getTipeKeuangan();
        return view('components.dashboard.side-nav', compact(['keuangans']));
    }
}
