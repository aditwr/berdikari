<?php

namespace App\Http\Livewire\Dashboard\Keuangan\Pemasukan;

use App\Models\Keuangan;
use App\Models\Pemasukan;
use Livewire\Component;

class Create extends Component
{
    public $keuanganAktif;

    public function mount()
    {
        $this->keuanganAktif = Keuangan::all()->first();
    }

    public function render()
    {
        return view('livewire.dashboard.keuangan.pemasukan.create');
    }
}
