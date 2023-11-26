<?php

namespace App\Http\Livewire\Dashboard\PengelolaanWeb\Galeri;

use App\Helpers\CollectionPagination;
use App\Models\Gallery;
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
    }

    public $foto, $judul_foto, $deskripsi_foto, $hapusId;
    public $tampilkanTombolUpload = true, $tampilkanMenuUpload = false;
    public $notification = ['status' => false, 'title' => '', 'message' => ''];

    public function munculkanMenuUpload()
    {
        $this->tampilkanMenuUpload = !$this->tampilkanMenuUpload;
        $this->tampilkanTombolUpload = !$this->tampilkanTombolUpload;
        $this->reset('notification');
    }

    public function priviewFoto($url)
    {
        $this->dispatchBrowserEvent('priviewFoto', ['url' => $url]);
    }

    public function upload()
    {
        $this->validate([
            'foto' => 'required|image|max:6000', // 1MB Max
            'judul_foto' => 'required|max:255',
            'deskripsi_foto' => 'required',
        ]);

        $namaFoto = Str::slug($this->judul_foto) . '-' . rand(0, 1000) . '.' . $this->foto->getClientOriginalExtension();
        $this->foto->storeAs('gallery', $namaFoto);
        $data = Gallery::create([
            'judul' => $this->judul_foto,
            'deskripsi' => $this->deskripsi_foto,
            'url_foto' => $namaFoto,
        ]);

        $this->munculkanMenuUpload();
        $this->notification = [
            'status' => 'success',
            'title' => 'Berhasil',
            'message' => 'Foto <b>' . $data->judul . '</b> berhasil tersimpan di galeri',
        ];
        // reset 
        $this->reset(['foto', 'judul_foto', 'deskripsi_foto']);
    }
    public function tampilkanFoto($id)
    {
        $jumlah_foto_tampil = Gallery::where('tampilkan_di_beranda', 1)->count();
        if ($jumlah_foto_tampil >= 6) {
            $this->notification = [
                'status' => 'failed',
                'title' => 'Gagal',
                'message' => 'Foto yang ditampilkan di halaman utama tidak boleh lebih dari 6 foto',
            ];
            return;
        }
        $data = Gallery::findOrFail($id);
        // update column
        $data->update([
            'tampilkan_di_beranda' => 1,
        ]);
        $this->notification = [
            'status' => 'success',
            'title' => 'Berhasil',
            'message' => 'Foto <b>' . $data->judul . '</b> Akan ditampilkan di halaman utama',
        ];
    }
    public function sembunyikanFoto($id)
    {
        $data = Gallery::findOrFail($id);
        // update column
        $data->update([
            'tampilkan_di_beranda' => false,
        ]);
        $this->notification = [
            'status' => 'success',
            'title' => 'Berhasil',
            'message' => 'Foto <b>' . $data->judul . '</b> Akan disembunyikan di halaman utama',
        ];
    }

    public function hapusFoto()
    {
        $data = Gallery::findOrFail($this->hapusId);
        Storage::delete('gallery/' . $data->url_foto);
        $data->delete();
        $this->notification = [
            'status' => 'success',
            'title' => 'Berhasil',
            'message' => 'Foto <b>' . $data->judul . '</b> berhasil dihapus dari galeri',
        ];
    }

    public function render()
    {
        $listFoto = Gallery::latest()->paginate(12);
        return view('livewire.dashboard.pengelolaan-web.galeri.index', compact('listFoto'));
    }
}
