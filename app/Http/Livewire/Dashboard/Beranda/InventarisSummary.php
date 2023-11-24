<?php

namespace App\Http\Livewire\Dashboard\Beranda;

use App\Models\Inventaris;
use Livewire\Component;
use App\Models\JenisInventaris;

class InventarisSummary extends Component
{
    protected $listeners = ['kategoriInventarisAktifBerubah' => 'ubahKategori'];

    public $idJenisInventarisAktif;
    public $BarangInventarisAktif;
    public $baik, $perlu_perbaikan, $rusak;

    public function mount()
    {
        // atur jenis inventaris yg aktif
        $this->idJenisInventarisAktif = JenisInventaris::first()->id;
        // ambil data inventaris berdasarkan jenis inventaris yg aktif dengan relasi

        // hitung kondisi barang
        $this->hitungKondisiBarang();
    }

    public function hitungKondisiBarang()
    {
        $this->BarangInventarisAktif = Inventaris::where('jenis_inventaris_id', $this->idJenisInventarisAktif)->get();
        $this->baik = $this->BarangInventarisAktif->where('kondisi', 'Baik')->count() + $this->BarangInventarisAktif->where('kondisi', 'Sangat Baik')->count() + $this->BarangInventarisAktif->where('kondisi', 'Cukup Baik')->count();
        $this->perlu_perbaikan = $this->BarangInventarisAktif->where('kondisi', 'Perlu Perbaikan')->count();
        $this->rusak = $this->BarangInventarisAktif->where('kondisi', 'Rusak')->count() + $this->BarangInventarisAktif->where('kondisi', 'Tidak Bisa Digunakan')->count();
    }

    public function ubahKategori($idJenisInventarisAktif)
    {
        // ubah id aktif
        $this->idJenisInventarisAktif = $idJenisInventarisAktif;
        // hitung kondisi barang
        $this->hitungKondisiBarang();
    }

    public function render()
    {
        $inventariss = JenisInventaris::all();
        return view('livewire.dashboard.beranda.inventaris', compact(['inventariss']));
    }
}
