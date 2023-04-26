<?php

namespace App\Http\Livewire\Dashboard\Keuangan\Pengeluaran;

use Livewire\Component;
use App\Models\Keuangan;
use App\Models\Pengeluaran;
use App\Models\RiwayatKeuangan;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $keuanganAktif;
    public $dataKeuanganAktif;

    public $bulanAktif;
    public $tahunAktif;

    public $pagination = 10;

    public $deleteId = null;

    protected $listeners = [
        'KeuanganAktifUpdated' => 'updateKeuanganAktif',
        'KeuanganAktifUpdatedFromSelect' => 'updateKeuanganAktifFromSelect',
        'refreshTable' => '$refresh',
    ];

    // untuk permulaan, ambil data pemasukan bulan ini dan tahun ini di mount
    public function mount()
    {
        // atur keuangan aktif ke tipe keuangan yang pertama di database
        // tidak menggunakan find(1), untuk jaga-jaga jika ada data yang dihapus
        $this->keuanganAktif = Keuangan::all()->first()->slug;

        // atur data keuangan aktif ke data keuangan yang pertama di database
        $this->dataKeuanganAktif = Keuangan::all()->first();

        // atur bulan dan tahun aktif ke bulan dan tahun sekarang
        $this->bulanAktif = date('m');
        $this->tahunAktif = date('Y');
    }

    // method untuk mengupdate keuangan aktif
    public function updateKeuanganAktif($data)
    {
        $this->keuanganAktif = $data['keuanganAktif'];
        $this->dataKeuanganAktif = $data['dataKeuanganAktif'];
        $this->bulanAktif = $data['bulanAktif'];
        $this->tahunAktif = $data['tahunAktif'];
    }
    public function updateKeuanganAktifFromSelect($data)
    {
        $this->keuanganAktif = $data['keuanganAktif'];
        $this->dataKeuanganAktif = Keuangan::where('slug', $data['keuanganAktif'])->first();
    }

    // method untuk mengambil data pemasukan berdasarkan tipe keuangan, bulan, dan tahun
    public function getPengeluaran()
    {
        return Pengeluaran::where('tipe', $this->keuanganAktif)
            ->whereMonth('tanggal', $this->bulanAktif)
            ->whereYear('tanggal', $this->tahunAktif)->latest()->paginate($this->pagination, ['*'], 'pengeluaran');
    }

    public function deleteItem()
    {
        $pengeluaran = Pengeluaran::find($this->deleteId);
        $pengeluaran->riwayatKeuangan()->delete();
        // update nominal keuangan
        $this->dataKeuanganAktif->update([
            'nominal' => $this->dataKeuanganAktif->nominal + $pengeluaran->nominal
        ]);

        $pengeluaran->delete();
        $this->emit('refreshTable');
        $this->emit('refresh');
        // $this->emit('alert', ['type' => 'success', 'message' => 'Data berhasil dihapus']);
    }

    public function render()
    {
        $pengeluarans = $this->getPengeluaran();
        return view('livewire.dashboard.keuangan.pengeluaran.table', compact(['pengeluarans']));
    }
}
