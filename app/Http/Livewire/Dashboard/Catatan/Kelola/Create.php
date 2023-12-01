<?php

namespace App\Http\Livewire\Dashboard\Catatan\Kelola;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\JenisCatatan;

class Create extends Component
{
    public $namaCatatan;
    public $keterangan;

    protected $rules = [
        'namaCatatan' => 'required|unique:jenis_catatans,nama',
    ];

    public function submit()
    {
        // validation
        $this->validate();

        // store jenis catatan
        $catatan = new JenisCatatan();
        $catatan->nama = $this->namaCatatan;
        $catatan->slug = Str::slug($this->namaCatatan);
        $catatan->keterangan = $this->keterangan;
        $catatan->save();

        $this->emit('refresh');
        $this->reset(['namaCatatan', 'keterangan']);
        $this->dispatchBrowserEvent('tambah-kategori-catatan-berhasil', ["title" => "Berhasil", "message" => "Kategori catatan berhasil ditambahkan!"]);
    }

    public function render()
    {
        return view('livewire.dashboard.catatan.kelola.create');
    }
}
