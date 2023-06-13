<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengelolaanWebController extends Controller
{
    public function header()
    {
        return view('dashboard.pengelolaan-web.header.index');
    }
    public function kegiatan()
    {
        return view('dashboard.pengelolaan-web.kegiatan.index');
    }
}
