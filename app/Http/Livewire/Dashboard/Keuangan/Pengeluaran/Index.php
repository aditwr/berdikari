<?php

namespace App\Http\Livewire\Dashboard\Keuangan\Pengeluaran;

use Livewire\Component;

class Index extends Component
{
    public $bulanAktif;
    public $tahunAktif;

    public function mount()
    {
        $this->bulanAktif = date('m');
        $this->tahunAktif = date('Y');
    }

    public function updatedBulanAktif()
    {
        $this->emit('bulanAktifUpdated', $this->bulanAktif);
    }
    public function updatedTahunAktif()
    {
        $this->emit('tahunAktifUpdated', $this->tahunAktif);
    }
    public function render()
    {
        return view('livewire.dashboard.keuangan.pengeluaran.index');
    }
}
