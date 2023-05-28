<?php

namespace App\Http\Livewire\Dashboard\Catatan\Item;

use App\Models\Catatan;
use Livewire\Component;
use App\Models\JenisCatatan;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $daftarJenisCatatan, $jenisCatatanAktif;
    public $bulanAktif;
    public $tahunAktif;
    public $search;
    public $deleteId;
    public $notification = ['status' => false, 'title' => '', 'message' => ''];

    protected $listeners = [
        'refresh' => '$refresh',
        'search' => 'search',
        'notification' => 'showNotification',
    ];
    public function mount()
    {
        $this->daftarJenisCatatan = JenisCatatan::all();
        $this->jenisCatatanAktif = "semua";
        $this->bulanAktif = "semua";
        $this->tahunAktif = "semua";
    }

    public function getDaftarCatatan()
    {
        $daftarCatatan = Catatan::query();
        if ($this->jenisCatatanAktif != "semua") {
            $daftarCatatan = $daftarCatatan->where('jenis_catatan_id', $this->jenisCatatanAktif);
        }
        if ($this->bulanAktif != "semua") {
            $daftarCatatan = $daftarCatatan->whereMonth('created_at', $this->bulanAktif);
        }
        if ($this->tahunAktif != "semua") {
            $daftarCatatan = $daftarCatatan->whereYear('created_at', $this->tahunAktif);
        }
        if ($this->search != null) {
            $daftarCatatan = $daftarCatatan->where('judul', 'like', '%' . $this->search . '%');
        }

        return $daftarCatatan->latest()->paginate(8);
    }
    public function search($search)
    {
        $this->search = $search;
    }

    public function setEdit($jenisCatatan)
    {
        $this->emit('setUpdate', $jenisCatatan);
    }

    public function deleteItem()
    {
        $catatan = Catatan::find($this->deleteId);
        $nama = $catatan->judul;
        $catatan->delete();

        $this->emit('notification', ['title' => 'Penghapusan berhasil', 'message' => 'Catatan dengan judul "<span class="font-medium" >' . $nama . '</span>" berhasil dihapus!']);
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
        $daftarCatatan = $this->getDaftarCatatan();
        return view('livewire.dashboard.catatan.item.table', compact('daftarCatatan'));
    }
}
