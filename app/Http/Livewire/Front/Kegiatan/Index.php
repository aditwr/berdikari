<?php

namespace App\Http\Livewire\Front\Kegiatan;

use App\Models\Kegiatan;
use Livewire\Component;

class Index extends Component
{
    public $search, $bulan, $tahun, $perPage = 12;

    public function getKegiatan()
    {
        $listKegiatan = Kegiatan::query();
        if ($this->search) {
            $listKegiatan->where('judul_kegiatan', 'like', '%' . $this->search . '%');
        }
        if ($this->bulan) {
            $listKegiatan->whereMonth('created_at', $this->bulan);
        }
        if ($this->tahun) {
            $listKegiatan->whereYear('created_at', $this->tahun);
        }

        return $listKegiatan->latest()->paginate($this->perPage);
    }
    public function render()
    {
        $listKegiatan = $this->getKegiatan();
        return view('livewire.front.kegiatan.index', compact('listKegiatan'));
    }
}
