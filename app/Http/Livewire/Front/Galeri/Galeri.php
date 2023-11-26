<?php

namespace App\Http\Livewire\Front\Galeri;

use App\Models\Gallery;
use Livewire\Component;

class Galeri extends Component
{
    public $search, $bulan, $tahun, $perPage = 12;

    public function getListGalleries()
    {
        $listGalleries = Gallery::query();
        if ($this->search) {
            $listGalleries->where('judul', 'like', '%' . $this->search . '%');
        }
        if ($this->bulan) {
            $listGalleries->whereMonth('created_at', $this->bulan);
        }
        if ($this->tahun) {
            $listGalleries->whereYear('created_at', $this->tahun);
        }

        return $listGalleries->latest()->paginate($this->perPage);
    }

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
        $listGalleries = $this->getListGalleries();
        return view('livewire.front.galeri.galeri', compact('listGalleries'));
    }
}
