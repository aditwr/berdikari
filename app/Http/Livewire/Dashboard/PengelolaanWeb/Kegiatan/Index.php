<?php

namespace App\Http\Livewire\Dashboard\PengelolaanWeb\Kegiatan;

use Livewire\Component;
use App\Models\Kegiatan;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search, $bulan = null, $tahun = null;
    public $perPage = 4, $notification = [
        'status' => false,
        'title' => '',
        'message' => ''
    ];
    public $deleteId, $updateItem;

    public function getKegiatan()
    {
        $listKegiatan = Kegiatan::query();
        if ($this->search) {
            $listKegiatan->where('judul_kegiatan', 'like', '%' . $this->search . '%')->latest()->paginate(8);
        }
        if ($this->bulan) {
            $listKegiatan->whereMonth('created_at', $this->bulan);
        }
        if ($this->tahun) {
            $listKegiatan->whereYear('created_at', $this->tahun);
        }

        return $listKegiatan->latest()->paginate($this->perPage);
    }
    public function deleteItem()
    {
        $kegiatan = Kegiatan::find($this->deleteId);
        $judulKegiatan = $kegiatan->judul_kegiatan;
        $gambar = $kegiatan->gambar;
        if ($gambar) {
            unlink(storage_path('app/public/' . $gambar));
        }
        $kegiatan->delete();
        $this->notification = [
            'status' => true,
            'title' => 'Berhasil',
            'message' => 'Data artikel kegiatan <b>' . $judulKegiatan . '</b> berhasil dihapus!'
        ];
        $this->deleteId = null;
    }

    public function render()
    {
        $listKegiatan = $this->getKegiatan();
        return view('livewire.dashboard.pengelolaan-web.kegiatan.index', compact(['listKegiatan']));
    }
}
