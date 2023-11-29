<?php

namespace App\Http\Livewire\Dashboard\Keuangan\Pengeluaran;

use Livewire\Component;
use App\Models\Keuangan;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;

class Create extends Component
{
    public $keuanganAktif;

    protected $listeners = [
        'KeuanganAktifUpdatedFromSelect' => 'updatedKeuanganAktif',
        'refreshTable' => '$refresh',
    ];

    public function mount()
    {
        $this->keuanganAktif = Keuangan::all()->first();
    }

    public function updatedKeuanganAktif($keuanganAktif)
    {
        $this->keuanganAktif = Keuangan::where('slug', $keuanganAktif['keuanganAktif'])->get()->first();
    }


    public function render()
    {
        // hitung total saldo sesuai keuangan aktif
        $total_pemasukan = Pemasukan::where('keuangan_id', $this->keuanganAktif->id)->sum('nominal');
        $total_pengeluaran = Pengeluaran::where('keuangan_id', $this->keuanganAktif->id)->sum('nominal');
        $total_saldo = $total_pemasukan - $total_pengeluaran;
        return view('livewire.dashboard.keuangan.pengeluaran.create', compact(['total_saldo']));
    }
}
