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

        $this->emit('notification', ['title' => 'Ubah data berhasil', 'message' => 'Data keuangan "<span class="font-medium" >' . $nama_keuangan_lama . '</span>" berhasil diubah!']);
        $this->emit('refresh');
    }

    public function render()
    {
        return view('livewire.dashboard.keuangan.kelola.edit-form');
    }
}
