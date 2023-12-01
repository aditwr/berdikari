<?php

namespace App\Http\Livewire\Dashboard\Inventaris;

use App\Models\Catatan;
use Livewire\Component;
use App\Models\Inventaris;
use App\Models\JenisCatatan;
use Livewire\WithPagination;
use App\Models\JenisInventaris;

class DaftarBarang extends Component
{
    use WithPagination;

    public $jenisInventarisId, $jenisInventaris;
    public $daftarJenisCatatan, $jenisCatatanAktif;
    public $search;
    public $deleteId, $deleteNama;
    public $notification = ['status' => false, 'title' => '', 'message' => ''];
    public $barangEdit;

    protected $listeners = [
        'refresh' => '$refresh',
        'search' => 'search',
        'notification' => 'showNotification',
    ];
    public function mount($idInventaris)
    {
        $this->daftarJenisCatatan = JenisCatatan::all();
        $this->jenisCatatanAktif = "semua";
        $this->jenisInventarisId = $idInventaris;

        $this->jenisInventaris = JenisInventaris::find($idInventaris);
    }
    public function getDaftarBarang()
    {
        $daftarBarang = Inventaris::where('jenis_inventaris_id', $this->jenisInventarisId);
        if ($this->search != null) {
            $daftarBarang = $daftarBarang->where('nama_inventaris', 'like', '%' . $this->search . '%')->orWhere('lokasi', 'like', '%' . $this->search . '%')->orWhere('pemegang', 'like', '%' . $this->search . '%')->orWhere('kondisi', 'like', '%' . $this->search . '%')->orWhere('keterangan', 'like', '%' . $this->search . '%');
        }

        return $daftarBarang->latest()->paginate(12);
    }
    public function search($search)
    {
        $this->search = $search;
    }

    public function setEdit($barang)
    {
        $this->emit('setUpdate', $barang);
    }
    public function setDelete($barang)
    {
        $this->deleteId = $barang['id'];
        $this->deleteNama = $barang['nama_inventaris'];
    }

    public function deleteItem()
    {
        $barang = Inventaris::find($this->deleteId);
        $nama = $barang->nama_inventaris;
        $barang->delete();

        $this->emit('notification', ['title' => 'Penghapusan berhasil', 'message' => '"<span class="font-medium" >' . $nama . '</span>" berhasil dihapus dari daftar barang inventaris']);
        $this->emit('refresh');
    }

    public function showNotification($data)
    {
        $this->notification = [
            'status' => true,
            'title' => $data['title'],
            'message' => $data['message'],
        ];
    }
    public function render()
    {
        $daftarBarang = $this->getDaftarBarang();
        return view('livewire.dashboard.inventaris.daftar-barang', compact('daftarBarang'));
    }
}
