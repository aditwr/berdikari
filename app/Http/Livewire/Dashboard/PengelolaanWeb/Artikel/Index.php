<?php

namespace App\Http\Livewire\Dashboard\PengelolaanWeb\Artikel;

use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search, $bulan = null, $tahun = null, $kategori = null;
    public $perPage = 4, $notification = [
        'status' => false,
        'title' => '',
        'message' => ''
    ];
    public $deleteId;

    public function getArtikel()
    {
        $listArtikel = Artikel::query();
        if ($this->search) {
            $listArtikel->where('judul', 'like', '%' . $this->search . '%');
        }
        if ($this->bulan) {
            $listArtikel->whereMonth('created_at', $this->bulan);
        }
        if ($this->tahun) {
            $listArtikel->whereYear('created_at', $this->tahun);
        }
        if ($this->kategori) {
            $listArtikel->where('kategori_id', $this->kategori);
        }

        return $listArtikel->latest()->paginate($this->perPage);
    }
    public function deleteItem()
    {
        $artikel = Artikel::find($this->deleteId);
        $judulArtikel = $artikel->judul;
        $gambar = $artikel->gambar;
        if ($gambar) {
            unlink(storage_path('app/public/' . $gambar));
        }
        $artikel->delete();
        $this->notification = [
            'status' => true,
            'title' => 'Berhasil',
            'message' => 'Artikel <b>' . $judulArtikel . '</b> berhasil dihapus!'
        ];
        $this->deleteId = null;
    }
    public function render()
    {
        $listArtikel = $this->getArtikel();
        $listKategori = KategoriArtikel::all();
        return view('livewire.dashboard.pengelolaan-web.artikel.index', compact(['listArtikel', 'listKategori']));
    }
}
