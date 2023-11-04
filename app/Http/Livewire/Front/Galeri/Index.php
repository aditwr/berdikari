<?php

namespace App\Http\Livewire\Front\Galeri;

use Livewire\Component;

class Index extends Component
{
    public $listGallery;


    public function priviewFoto($gallery)
    {
        $nama_file = $gallery['url_foto'];
        $url = asset('storage/gallery/' . $nama_file);
        $judul = $gallery['judul'];
        $deskripsi = $gallery['deskripsi'];
        $tanggal = $gallery['created_at'];
        $tanggal = date('d F Y', strtotime($tanggal));
        $this->dispatchBrowserEvent('priviewFoto', ['url' => $url, 'judul' => $judul, 'deskripsi' => $deskripsi, 'tanggal' => $tanggal]);
    }


    public function render()
    {
        return view('livewire.front.galeri.index');
    }
}
