<?php

namespace App\Http\Livewire\Dashboard\Keuangan\Pengeluaran;

use Livewire\Component;
use App\Models\Keuangan;

class Create extends Component
{
    public $keuanganAktif;

    public function mount()
    {
        $this->keuanganAktif = Keuangan::all()->first();
    }

    public function render()
    {
        return view('livewire.dashboard.keuangan.pengeluaran.create');
    }
}
