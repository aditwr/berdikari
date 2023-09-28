<?php

namespace App\Http\Livewire\Dashboard\PengelolaanWeb\Artikel;

use App\Models\Artikel;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\KategoriArtikel;

class Create extends Component
{
    use WithFileUploads;

    public $judul, $slug, $gambar, $penulis, $isi, $kategori;

    public function updatedGambar()
    {
        $this->validate([
            'gambar' => 'image|max:5120', // 1MB Max
        ]);
    }
    public function updatedJudul()
    {
        $this->validate([
            'judul' => 'required',
        ]);
        $this->slug = Str::slug($this->judul, '-');
    }
    public function updatedIsi()
    {
        $this->validate([
            'isi' => 'required',
        ]);
    }
    // make dispacth browser event after component has been loaded
    public function mount()
    {
        $this->dispatchBrowserEvent('loaded');
        $this->penulis = auth()->user()->email;
    }
    protected $rules = [
        'judul' => 'required',
        'slug' => 'required|unique:artikels,slug',
        'gambar' => 'required|image|max:5120', // 1MB Max
        'penulis' => 'required',
        'isi' => 'required',
    ];
    public function store()
    {
        $int_slug = 1;
        $loop = true;

        $slug = Artikel::where('slug', $this->slug)->first();
        if ($slug) {
            while ($loop) {
                $slug = Artikel::where('slug', $this->slug . '-' . $int_slug)->first();
                if ($slug) {
                    $int_slug++;
                } else {
                    $this->slug = $this->slug . '-' . $int_slug;
                    $loop = false;
                }
            }
        }

        $this->validate();
        $this->gambar = $this->gambar->store('artikel', 'public');

        $artikel = Artikel::create([
            'judul' => $this->judul,
            'slug' => $this->slug,
            'kategori_id' => $this->kategori,
            'gambar' => $this->gambar,
            'penulis' => $this->penulis,
            'isi' => $this->isi,
            'views' => 0,
        ]);
        session()->flash('success', [
            'title' => 'Berhasil',
            'message' => 'Artikel <b>' . $artikel->judul . '</b> berhasil ditambahkan!'
        ]);
        return redirect()->route('dashboard.pengelolaan-web.artikel.index');
    }
    public function render()
    {
        $kategoriArtikel = KategoriArtikel::all();
        return view('livewire.dashboard.pengelolaan-web.artikel.create', compact(['kategoriArtikel']));
    }
}
