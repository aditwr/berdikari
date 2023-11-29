<?php

namespace App\Http\Livewire\Dashboard\Keuangan\Pengeluaran;

use Livewire\Component;
use App\Models\Keuangan;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Livewire\WithPagination;
use App\Models\AkumulasiKeuanganTahunan;

class Table extends Component
{
    use WithPagination;

    public $keuanganAktif;
    public $dataKeuanganAktif;
    public $search;

    public $bulanAktif;
    public $tahunAktif;

    public $pagination = 10;
    public $deleteId = null;

    protected $listeners = [
        'KeuanganAktifUpdated' => 'updateKeuanganAktif',
        'KeuanganAktifUpdatedFromSelect' => 'updateKeuanganAktifFromSelect',
        'refreshTable' => '$refresh',
        'bulanAktifUpdated' => 'updateBulanAktif',
        'tahunAktifUpdated' => 'updateTahunAktif',
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
    public function updateBulanAktif($bulan)
    {
        $this->bulanAktif = $bulan;
    }
    public function updateTahunAktif($tahun)
    {
        $this->tahunAktif = $tahun;
    }

    // method untuk mengambil data pemasukan berdasarkan tipe keuangan, bulan, dan tahun
    public function getPengeluaran()
    {
        if ($this->search == null) {
            return Pengeluaran::where('tipe', $this->keuanganAktif)
                ->whereMonth('created_at', $this->bulanAktif)
                ->whereYear('created_at', $this->tahunAktif)->latest()->paginate($this->pagination, ['*'], 'pengeluaran');
        } else {
            return Pengeluaran::where('tipe', $this->keuanganAktif)->where('judul', 'like', '%' . $this->search . '%')->latest()->paginate($this->pagination, ['*'], 'pengeluaran');
        }
    }

    public function deleteItem()
    {
        $pengeluaran = Pengeluaran::find($this->deleteId);
        $pengeluaran->delete();
        $this->emit('refreshTable');
        $this->emit('refresh');
        $this->dispatchBrowserEvent('delete-pengeluaran-success', ['title' => 'Sukses', 'message' => 'Data pengeluaran berhasil dihapus!']);
    }

    public function setUpdate($pengeluaran)
    {
        $this->emit('setUpdate', $pengeluaran);
    }

    public function render()
    {
        $pengeluarans = $this->getPengeluaran();
        // ambil tanggal dalam perulangan
        for ($i = 0; $i < count($pengeluarans); $i++) {
            // ambil tanggal dalam format hari, 
            $tanggal_dibuat = strtotime($pengeluarans[$i]->created_at);
            // hitung saldo awal
            // hitung pemasukan sampai sebelum data dibuat
            $pemasukan_sampai_sebelum_data_dibuat = Pemasukan::where('tipe', $this->keuanganAktif)
                ->where('created_at', '<', $pengeluarans[$i]->created_at)
                ->sum('nominal');
            // hitung pengeluaran sampai sebelum data dibuat
            $pengeluaran_sampai_sebelum_data_dibuat = Pengeluaran::where('tipe', $this->keuanganAktif)
                ->where('created_at', '<', $pengeluarans[$i]->created_at)
                ->sum('nominal');
            // hitung saldo awal
            $saldo_awal = $pemasukan_sampai_sebelum_data_dibuat - $pengeluaran_sampai_sebelum_data_dibuat;

            if (AkumulasiKeuanganTahunan::where('tipe', $this->keuanganAktif)->exists()) {
                $saldo_awal += AkumulasiKeuanganTahunan::where('tipe', $this->keuanganAktif)->sum('nominal');
            }
            // masukan sebagai atribut tambahan ke array pengel$pengeluarans
            $pengeluarans[$i]->perhitungan_saldo_awal = $saldo_awal;
            // hitung saldo akhir
            $pengeluarans[$i]->perhitungan_saldo_akhir = $saldo_awal - $pengeluarans[$i]->nominal;
        }
        return view('livewire.dashboard.keuangan.pengeluaran.table', compact(['pengeluarans']));
    }
}
