<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function landingPage()
    {
        return view('front.landing-page');
    }

    public function activity()
    {
        return view('front.activity');
    }

    public function article()
    {
        return view('front.article');
    }

    public function about()
    {
        return view('front.about');
    }

    public function coba()
    {
        return view('front.coba');
    }
    public function test()
    {
        return view('dashboard.test');
    }
    public function simpancatatan()
    {
        dd(request()->all());
        $catatan = request()->catatan;
        return $catatan;
    }
}
