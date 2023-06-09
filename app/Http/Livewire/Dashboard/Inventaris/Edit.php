<?php

namespace App\Http\Livewire\Dashboard\Inventaris;

use App\Models\Inventaris;
use Livewire\Component;

class Edit extends Component
{
    public $barangInventarisId, $namaBarang, $jumlahBarang, $kondisiBarang, $lokasiBarang, $pemegang, $keterangan;
    protected $listeners = [
        'setUpdate' => 'setUpdate',
    ];
    public function setUpdate($barang)
    {
        $this->barangInventarisId = $barang['id'];
        $this->namaBarang = $barang['nama_inventaris'];
        $this->jumlahBarang = $barang['jumlah'];
        $this->kondisiBarang = $barang['kondisi'];
        $this->lokasiBarang = $barang['lokasi'];
        $this->pemegang = $barang['pemegang'];
        $this->keterangan = $barang['keterangan'];
    }
    public function update()
    {
        $inventaris = Inventaris::find($this->barangInventarisId);
        $nama = $inventaris->nama_inventaris;
        $inventaris->update([
            'nama_inventaris' => $this->namaBarang,
            'jumlah' => $this->jumlahBarang,
            'kondisi' => $this->kondisiBarang,
            'lokasi' => $this->lokasiBarang,
            'pemegang' => $this->pemegang,
            'keterangan' => $this->keterangan,
        ]);

        $this->emit('notification', ['title' => 'Edit Berhasil', 'message' => 'Data barang inventaris "<span class="font-medium" >' . $nama . '</span>" berhasil diubah!']);
        $this->emit('refresh');
    }
    public function render()
    {
        return view('livewire.dashboard.inventaris.edit');
    }
}
