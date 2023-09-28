<?php

namespace App\Http\Livewire\Dashboard\PengelolaanWeb\Galeri;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads, WithPagination;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount()
    {
        $this->daftarFoto = collect(Storage::disk('public')->files('galeri'));
    }

    public $foto, $tampilkanTombolUpload = true, $tampilkanMenuUpload = false, $daftarFoto;
    public $notification = ['status' => false, 'title' => '', 'message' => ''];

    public function munculkanMenuUpload()
    {
        $this->tampilkanMenuUpload = !$this->tampilkanMenuUpload;
        $this->tampilkanTombolUpload = !$this->tampilkanTombolUpload;
    }

    public function fotoUpdated()
    {
        $this->validate([
            'foto' => 'required|image|max:6000', // 1MB Max
        ]);
    }

    public function priviewFoto($url)
    {
        $this->dispatchBrowserEvent('priviewFoto', ['url' => $url]);
    }

    public function upload()
    {


        $this->foto->store('galeri', 'public');
        $this->reset('foto');
        $this->munculkanMenuUpload();
        $this->notification = [
            'status' => true,
            'title' => 'Upload berhasil!',
            'message' => 'Foto berhasil tersimpan di galeri. Foto akan ditampilkan di halaman galeri.',
        ];

        $this->daftarFoto = Storage::disk('public')->files('galeri');
    }

    public function render()
    {
        return view('livewire.dashboard.pengelolaan-web.galeri.index');
    }
}
