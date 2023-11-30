<?php

namespace App\Http\Livewire\Dashboard\Keuangan\Kelola;

use Livewire\Component;
use App\Models\Keuangan;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Livewire\WithPagination;
use App\Models\AkumulasiKeuanganTahunan;

class Table extends Component
{
    use WithPagination;

    public $search;
    public $deleteId;

    protected $listeners = [
        'refresh' => '$refresh',
        'search' => 'search',
    ];

    public function getDaftarKeuangan()
    {
        if ($this->search == null) {
            $daftarKeuangan = Keuangan::latest()->paginate(10);
        } else {
            $daftarKeuangan = Keuangan::where('slug', 'like', '%' . $this->search . '%')->latest()->paginate(10);
        }
        for ($i = 0; $i < count($daftarKeuangan); $i++) {
            $pemasukan = Pemasukan::where('tipe', $daftarKeuangan[$i]->slug)->sum('nominal');
            $pengeluaran = Pengeluaran::where('tipe', $daftarKeuangan[$i]->slug)->sum('nominal');
            $saldo = $pemasukan - $pengeluaran;
            $daftarKeuangan[$i]->saldo = $saldo;
        }
        return $daftarKeuangan;
    }
    public function search($search)
    {
        $this->search = $search;
    }

    public function setEdit($keuangan)
    {
        $this->emit('setUpdate', $keuangan);
    }

    public function deleteItem()
    {
        $keuangan = Keuangan::find($this->deleteId);
        $tipe = $keuangan->slug;

        $pemasukan = Pemasukan::where('tipe', $tipe)->get();
        foreach ($pemasukan as $item) {
            $item->delete();
        }
        $pengeluaran = Pengeluaran::where('tipe', $tipe)->get();
        foreach ($pengeluaran as $item) {
            $item->delete();
        }

        $akumulasi_keuangan_tahunan = AkumulasiKeuanganTahunan::where('tipe', $tipe)->get();
        foreach ($akumulasi_keuangan_tahunan as $item) {
            $item->delete();
        }

        $keuangan->delete();
        $this->emit('refresh');
        $this->dispatchBrowserEvent('delete-kategori-keuangan-success', ['title' => 'Berhasil', 'message' => 'Kategori keuangan berhasil dihapus!']);
    }

    public function render()
    {
        $daftarKeuangan = $this->getDaftarKeuangan();
        return view('livewire.dashboard.keuangan.kelola.table', compact('daftarKeuangan'));
    }
}
