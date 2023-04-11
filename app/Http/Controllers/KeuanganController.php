<?php

namespace App\Http\Controllers;

use App\Models\RiwayatKeuangan;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    public function index()
    {
        return view('dashboard.keuangan.overview');
    }

    public function laporan()
    {
        return view('dashboard.keuangan.manage');
    }

    public function pemasukan()
    {
        return view('dashboard.keuangan.pemasukan');
    }
}
