<?php

namespace App\Http\Livewire\Dashboard\Inventaris;

use App\Models\Inventaris;
use Livewire\Component;

class Create extends Component
{
    public $jenisInventaris;
    public $namaBarang, $jumlahBarang, $kondisiBarang, $lokasiBarang, $pemegang, $keterangan;

    protected $rules = [
        'namaBarang' => 'required',
        'jumlahBarang' => 'required|numeric',
        'kondisiBarang' => 'required',
        'lokasiBarang' => 'required',
        'pemegang' => 'required',
        'keterangan' => '',

    ];
    public function store()
    {
        $this->validate();

        $barang = Inventaris::create(
            [
                'jenis_inventaris_id' => $this->jenisInventaris->id,
                'nama_inventaris' => $this->namaBarang,
                'jumlah' => $this->jumlahBarang,
                'kondisi' => $this->kondisiBarang,
                'lokasi' => $this->lokasiBarang,
                'pemegang' => $this->pemegang,
                'keterangan' => $this->keterangan,
            ]
        );

        $this->reset(['namaBarang', 'jumlahBarang', 'kondisiBarang', 'lokasiBarang', 'pemegang', 'keterangan']);
        $this->emit('refresh');
        $this->emit('notification', ['status' => true, 'title' => 'Berhasil', 'message' => 'Data berhasil ditambahkan']);
    }
    public function render()
    {
        return view('livewire.dashboard.inventaris.create');
    }
}
