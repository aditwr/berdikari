<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Gallery;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function landingPage()
    {
        // kegiatan
        $listKegiatan = Kegiatan::latest()->take(12)->get();
        $listArtikel = Artikel::latest()->take(6)->get();
        return view('front.landing-page', compact(['listKegiatan', 'listArtikel']));
    }
    public function activity()
    {
        return view('front.activity');
    }
    public function activityDetail($id)
    {
        $kegiatan = Kegiatan::find($id);
        $kegiatanTerbaru = Kegiatan::latest()->take(5)->get();
        return view('front.partials.activity.activity-detail', compact(['kegiatan', 'kegiatanTerbaru']));
    }

    public function article()
    {
        return view('front.article');
    }

    public function articleDetail($id)
    {
        $artikel = Artikel::find($id);
        $artikelTerbaru = Artikel::latest()->take(5)->get();
        return view('front.partials.article.article-detail', compact(['artikel', 'artikelTerbaru']));
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
