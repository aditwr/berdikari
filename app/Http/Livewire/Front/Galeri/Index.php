<?php

namespace App\Http\Livewire\Front\Galeri;

use App\Models\Gallery;
use Livewire\Component;

class Index extends Component
{

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
        $listGalleries = Gallery::where('tampilkan_di_beranda', 1)->latest()->take(6)->get();
        return view('livewire.front.galeri.index', compact('listGalleries'));
    }
}
