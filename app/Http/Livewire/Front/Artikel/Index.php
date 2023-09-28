<?php

namespace App\Http\Livewire\Front\Artikel;

use App\Models\Artikel;
use Livewire\Component;

class Index extends Component
{
    public $search, $bulan, $tahun, $perPage = 12;

    public function getKegiatan()
    {
        $listArtikel = Artikel::query();
        if ($this->search) {
            $listArtikel->where('judul_kegiatan', 'like', '%' . $this->search . '%');
        }
        if ($this->bulan) {
            $listArtikel->whereMonth('created_at', $this->bulan);
        }
        if ($this->tahun) {
            $listArtikel->whereYear('created_at', $this->tahun);
        }

        return $listArtikel->latest()->paginate($this->perPage);
    }
    public function render()
    {
        $listArtikel = $this->getKegiatan();
        return view('livewire.front.artikel.index', compact('listArtikel'));
    }
}
