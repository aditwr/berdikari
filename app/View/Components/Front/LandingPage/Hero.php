<?php

namespace App\View\Components\Front\LandingPage;

use App\Models\Header;
use Illuminate\View\Component;

class Hero extends Component
{
    public $tulisan_header1, $tulisan_header2, $tulisan_header3;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->getTulisanHeader();
    }
    public function getTulisanHeader()
    {
        $header = Header::all();
        $this->tulisan_header1 = $header[0]->tulisan_header;
        $this->tulisan_header2 = $header[1]->tulisan_header;
        $this->tulisan_header3 = $header[2]->tulisan_header;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.landing-page.hero');
    }
}
