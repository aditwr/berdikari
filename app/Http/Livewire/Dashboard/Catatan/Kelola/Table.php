<?php

namespace App\Http\Livewire\Dashboard\Catatan\Kelola;

use Livewire\Component;
use App\Models\Keuangan;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\JenisCatatan;
use Livewire\WithPagination;
use App\Models\AkumulasiKeuanganTahunan;
use App\Models\Catatan;

class Table extends Component
{
    use WithPagination;

    public $search;
    public $deleteId;

    protected $listeners = [
        'refresh' => '$refresh',
        'search' => 'search',
    ];

    public function getDaftarJenisCatatan()
    {
        if ($this->search == null) {
            $daftarJenisCatatan = JenisCatatan::latest()->paginate(10);
        } else {
            $daftarJenisCatatan = JenisCatatan::where('nama', 'like', '%' . $this->search . '%')->latest()->paginate(10);
        }
        foreach ($daftarJenisCatatan as $jenisCatatan) {
            $jumlahItemCatatan = Catatan::where('jenis_catatan_id', $jenisCatatan->id)->count();
            $jenisCatatan->jumlah_item = $jumlahItemCatatan;
        }
        return $daftarJenisCatatan;
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
        $jenisCatatan = JenisCatatan::find($this->deleteId);
        $nama = $jenisCatatan->nama;
        $jenisCatatan->delete();

        $this->emit('notification', ['title' => 'Penghapusan berhasil', 'message' => 'Data keuangan "<span class="font-medium" >' . $nama . '</span>" berhasil dihapus!']);
        $this->emit('refresh');
    }

    public function render()
    {
        $daftarJenisCatatan = $this->getDaftarJenisCatatan();
        return view('livewire.dashboard.catatan.kelola.table', compact('daftarJenisCatatan'));
    }
}
