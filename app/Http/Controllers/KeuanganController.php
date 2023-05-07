<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatKeuangan;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Livewire\Components\Alert as ComponentsAlert;

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

    public function pengeluaran()
    {
        return view('dashboard.keuangan.pengeluaran');
    }

    public function kelola()
    {
        return view('dashboard.keuangan.kelola');
    }
}
