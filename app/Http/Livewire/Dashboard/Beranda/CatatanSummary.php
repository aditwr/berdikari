<?php

namespace App\Http\Livewire\Dashboard\Beranda;

use App\Models\Catatan;
use App\Models\JenisCatatan;
use Livewire\Component;

class CatatanSummary extends Component
{
    public $idKategoriCatatanAktif;
    public $catatans;

    protected $listeners = ['kategoriCatatanAktifBerubah' => 'ubahKategori'];

    public function mount()
    {
        // atur id kateogri catatan yg aktif
        $this->idKategoriCatatanAktif = JenisCatatan::first()->id;
    }

    public function ubahKategori($idKategoriCatatanAktif)
    {
        // ubah id aktif
        $this->idKategoriCatatanAktif = $idKategoriCatatanAktif;
    }
    public function render()
    {
        $kategoriCatatan = JenisCatatan::all();
        $jumlah_catatan_bulan_ini = Catatan::where('jenis_catatan_id', $this->idKategoriCatatanAktif)->whereMonth('created_at', date('m'))->count();
        return view('livewire.dashboard.beranda.catatan-summary', compact(['kategoriCatatan', 'jumlah_catatan_bulan_ini']));
    }
}
