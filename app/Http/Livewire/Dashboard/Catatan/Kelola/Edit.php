<?php

namespace App\Http\Livewire\Dashboard\Catatan\Kelola;

use Livewire\Component;
use App\Models\JenisCatatan;

class Edit extends Component
{
    public $idJenisCatatan;
    public $namaJenisCatatan;
    public $keterangan;

    protected $listeners = [
        'setUpdate' => 'setUpdate',
    ];

    public function setUpdate($jenisCatatan)
    {
        $this->idJenisCatatan = $jenisCatatan['id'];
        $this->namaJenisCatatan = $jenisCatatan['nama'];
        $this->keterangan = $jenisCatatan['keterangan'];
    }

    public function update()
    {
        $this->validate([
            'namaJenisCatatan' => 'required',
        ]);

        $jenisCatatan = JenisCatatan::find($this->idJenisCatatan);
        $nama_jenis_catatan_lama = $jenisCatatan->nama;

        $jenisCatatan->nama = $this->namaJenisCatatan;
        $jenisCatatan->keterangan = $this->keterangan;
        $jenisCatatan->save();
        // $keuangan = Keuangan::find($this->idJenisCatatan);
        // $nama_keuangan_lama = $keuangan->nama;
        // $keuangan->update([
        //     'nama' => $this->namaJenisCatatan,
        //     'keterangan' => $this->keterangan,
        // ]);

        $this->emit('notification', ['title' => 'Ubah data berhasil', 'message' => 'Data keuangan "<span class="font-medium" >' . $nama_jenis_catatan_lama . '</span>" berhasil diubah!']);
        $this->emit('refresh');
    }
    public function render()
    {
        return view('livewire.dashboard.catatan.kelola.edit');
    }
}
