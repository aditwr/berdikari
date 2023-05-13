<?php

namespace App\Http\Livewire\Dashboard\Keuangan\Kelola;

use App\Models\AkumulasiKeuanganTahunan;
use Livewire\Component;
use Illuminate\Support\Str;

class CreateForm extends Component
{
    public $namaKeuangan;
    public $keterangan;

    public $notification = [
        'show' => false,
        'nama' => '',
    ];

    protected $rules = [
        'namaKeuangan' => 'required',
    ];

    public function submit()
    {
        // validation
        $this->validate();

        // create new keuangan
        $keuangan = \App\Models\Keuangan::create([
            'nama' => $this->namaKeuangan,
            'slug' => Str::slug($this->namaKeuangan),
            'keterangan' => $this->keterangan,
        ]);

        // buat akumulasi keuangan tahunan sebelumnya dari 0
        AkumulasiKeuanganTahunan::create([
            'tipe' => $keuangan->slug,
            'tahun' => date('Y', strtotime('-1 year')),
            'total_pemasukan' => 0,
            'total_pengeluaran' => 0,
        ]);

        $this->notification['show'] = true;
        $this->notification['nama'] = $this->namaKeuangan;

        $this->emit('refresh');
        $this->reset(['namaKeuangan', 'keterangan']);
    }

    public function closeNotification()
    {
        $this->notification['show'] = false;
    }

    public function render()
    {
        return view('livewire.dashboard.keuangan.kelola.create-form');
    }
}
