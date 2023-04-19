<?php

namespace App\Http\Livewire\Dashboard\Keuangan\Pemasukan;

use Livewire\Component;
use App\Models\Keuangan;
use App\Models\Pemasukan;

class CreateForm extends Component
{
    public $keuanganAktif;

    public $judulPemasukan;
    public $nominalPemasukan;
    public $keteranganPemasukan;

    public function mount()
    {
        $this->keuanganAktif = Keuangan::all()->first();
    }

    public function submit()
    {
        // if validation success, do
        $this->validate([
            'judulPemasukan' => 'required',
            'nominalPemasukan' => 'required',
            'keteranganPemasukan' => 'required',
        ]);


        Pemasukan::create([
            'keuangan_id' => $this->keuanganAktif->id,
            'tipe' => $this->keuanganAktif->slug,
            'judul' => $this->judulPemasukan,
            'nominal' => $this->nominalPemasukan,
            'tanggal' => date('Y-m-d'),
            'keterangan' => $this->keteranganPemasukan,
            'total_nominal' => $this->keuanganAktif->nominal + $this->nominalPemasukan,
        ]);

        $this->reset(['judulPemasukan', 'nominalPemasukan', 'keteranganPemasukan']);

        $this->emit('pemasukanCreated');
    }
    public function render()
    {
        return view('livewire.dashboard.keuangan.pemasukan.create-form');
    }
}
