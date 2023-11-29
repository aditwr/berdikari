<?php

namespace App\Http\Livewire\Dashboard\Keuangan\Partials;

use App\Models\Keuangan;
use Livewire\Component;

class Select extends Component
{
    public $keuangans;
    public $keuanganAktif;
    public $classContainer;

    public function mount()
    {
        $this->keuangans = Keuangan::all();
        $this->keuanganAktif = $this->keuangans[0]->slug;
    }

    public function updatedKeuanganAktif()
    {
        $this->emit('KeuanganAktifUpdatedFromSelect', [
            'keuanganAktif' => $this->keuanganAktif,
        ]);
    }

    public function render()
    {
        return view('livewire.dashboard.keuangan.partials.select');
    }
}
