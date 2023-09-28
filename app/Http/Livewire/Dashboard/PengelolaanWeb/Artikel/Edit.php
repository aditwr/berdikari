<?php

namespace App\Http\Livewire\Dashboard\PengelolaanWeb\Artikel;

use Livewire\Component;
use App\Models\Kegiatan;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public $kegiatan;
    public $judulKegiatan, $foto, $penulis, $deskripsi, $deskripsiLama, $fotoLama;

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
    public function mount($kegiatan)
    {
        $this->penulis = auth()->user()->email;
        $this->judulKegiatan = $kegiatan->judul_kegiatan;
        $this->deskripsiLama = $kegiatan->deskripsi;
        $this->fotoLama = $kegiatan->gambar;
        if ($kegiatan->penulis != $this->penulis) {
            session()->flash('error', [
                'title' => 'Gagal',
                'message' => 'Anda tidak memiliki akses untuk mengedit artikel kegiatan ini!'
            ]);
            return redirect()->route('dashboard.pengelolaan-web.kegiatan.index');
        }

        $this->dispatchBrowserEvent('loaded');
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
    public function update()
    {
        if ($this->foto) {
            $this->validate([
                'judulKegiatan' => 'required',
                'foto' => 'image|max:5120', // 1MB Max
                'deskripsi' => 'required',
            ]);
            $this->foto = $this->foto->store('kegiatan', 'public');
            // delete old image
            unlink(storage_path('app/public/' . $this->fotoLama));
        } else {
            $this->validate([
                'judulKegiatan' => 'required',
                'deskripsi' => 'required',
            ]);
            $this->foto = $this->fotoLama;
        }

        $this->kegiatan->update([
            'judul_kegiatan' => $this->judulKegiatan,
            'gambar' => $this->foto,
            'deskripsi' => $this->deskripsi,
        ]);

        session()->flash('success', [
            'title' => 'Berhasil',
            'message' => 'Artikel kegiatan berhasil diubah!'
        ]);
        return redirect()->route('dashboard.pengelolaan-web.kegiatan.index');
    }
    public function render()
    {
        return view('livewire.dashboard.pengelolaan-web.artikel.edit');
    }
}
