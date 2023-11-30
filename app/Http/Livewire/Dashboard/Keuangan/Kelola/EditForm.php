<?php

namespace App\Http\Livewire\Dashboard\Keuangan\Kelola;

use Livewire\Component;
use App\Models\Keuangan;

class EditForm extends Component
{
    public $idKeuangan;
    public $namaKeuangan;
    public $keterangan;

    protected $listeners = [
        'setUpdate' => 'setUpdate',
    ];

    public function setUpdate($keuangan)
    {
        $this->idKeuangan = $keuangan['id'];
        $this->namaKeuangan = $keuangan['nama'];
        $this->keterangan = $keuangan['keterangan'];
    }

    public function update()
    {
        $this->validate([
            'namaKeuangan' => 'required',
        ]);

        $keuangan = Keuangan::find($this->idKeuangan);
        $nama_keuangan_lama = $keuangan->nama;
        $keuangan->update([
            'nama' => $this->namaKeuangan,
            'keterangan' => $this->keterangan,
        ]);

        $this->emit('refresh');
        $this->dispatchBrowserEvent('update-kategori-keuangan-success', ['title' => 'Berhasil', 'message' => 'Kategori keuangan berhasil diubah!']);
    }

    public function render()
    {
        return view('livewire.dashboard.keuangan.kelola.edit-form');
    }
}
