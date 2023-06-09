<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventarisController extends Controller
{
    public function index()
    {
        return view('dashboard.inventaris.index');
    }
    public function daftarbarang($id)
    {
        return view('dashboard.inventaris.daftar-barang', compact('id'));
    }
}
