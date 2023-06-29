<?php

namespace App\Http\Livewire\Dashboard\PengelolaanWeb\Kegiatan;

use Livewire\Component;
use App\Models\Kegiatan;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $judulKegiatan, $foto, $penulis, $deskripsi;

    public function updatedFoto()
    {
        $this->validate([
            'foto' => 'image|max:5120', // 1MB Max
        ]);
    }
    public function updatedJudulKegiatan()
    {
        $this->validate([
            'judulKegiatan' => 'required',
        ]);
    }
    public function updatedDeskripsi()
    {
        $this->validate([
            'deskripsi' => 'required',
        ]);
    }
    // make dispacth browser event after component has been loaded
    public function mount()
    {
        $this->dispatchBrowserEvent('loaded');
        $this->penulis = auth()->user()->email;
    }
    protected $rules = [
        'judulKegiatan' => 'required',
        'foto' => 'required|image|max:5120', // 1MB Max
        'penulis' => 'required',
        'deskripsi' => 'required',
    ];
    public function store()
    {
        $this->validate();
        $this->foto = $this->foto->store('kegiatan', 'public');
        $kegiatan = Kegiatan::create([
            'judul_kegiatan' => $this->judulKegiatan,
            'gambar' => $this->foto,
            'penulis' => $this->penulis,
            'deskripsi' => $this->deskripsi,
            'views' => 0,
        ]);
        session()->flash('success', [
            'title' => 'Berhasil',
            'message' => 'Kegiatan berhasil ditambahkan'
        ]);
        return redirect()->route('dashboard.pengelolaan-web.kegiatan.index');
    }
    public function render()
    {
        return view('livewire.dashboard.pengelolaan-web.kegiatan.create');
    }
}
