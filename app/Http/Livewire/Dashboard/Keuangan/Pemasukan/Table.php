<?php

namespace App\Http\Livewire\Dashboard\Keuangan\Pemasukan;

use Livewire\Component;
use App\Models\Keuangan;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $keuanganAktif;
    public $dataKeuanganAktif;
    public $search;

    public $bulanAktif;
    public $tahunAktif;

    public $pagination = 10;

    public $editId = null;
    public $deleteId = null;


    protected $listeners = [
        'KeuanganAktifUpdated' => 'updateKeuanganAktif',
        'KeuanganAktifUpdatedFromSelect' => 'updateKeuanganAktifFromSelect',
        'refreshTable' => '$refresh',
        'refresh' => '$refresh',
        'bulanAktifUpdated' => 'updateBulanAktif',
        'tahunAktifUpdated' => 'updateTahunAktif',
    ];

    // untuk permulaan, ambil data pemasukan bulan ini dan tahun ini di mount
    public function mount()
    {
        // atur keuangan aktif ke tipe keuangan yang pertama di database
        // tidak menggunakan find(1), untuk jaga-jaga jika ada data yang dihapus
        $this->keuanganAktif = Keuangan::first()->slug;

        // atur data keuangan aktif ke data keuangan yang pertama di database
        $this->dataKeuanganAktif = Keuangan::first();

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
    public function getPemasukan()
    {
        if ($this->search == null) {
            return Pemasukan::where('tipe', $this->keuanganAktif)
                ->whereMonth('created_at', $this->bulanAktif)
                ->whereYear('created_at', $this->tahunAktif)->latest()->paginate($this->pagination, ['*'], 'pemasukan');
        } else {
            return Pemasukan::where('tipe', $this->keuanganAktif)
                ->where('judul', 'like', '%' . $this->search . '%')->latest()->paginate($this->pagination, ['*'], 'pemasukan');
        }
    }

    public function deleteItem()
    {
        $pemasukan = Pemasukan::find($this->deleteId);
        $pemasukan->delete();
        $this->emit('refreshTable');
        $this->emit('refresh');
        $this->dispatchBrowserEvent('delete-pemasukan-success', ['title' => 'Sukses', 'message' => 'Data pemasukan berhasil dihapus!']);
    }

    public function setUpdate($pemasukan)
    {
        $this->emit('setUpdate', $pemasukan);
    }

    public function render()
    {
        $pemasukans = $this->getPemasukan();
        // ambil tanggal dalam perulangan
        for ($i = 0; $i < count($pemasukans); $i++) {
            // ambil tanggal dalam format hari, 
            $tanggal_dibuat = strtotime($pemasukans[$i]->created_at);
            // hitung saldo awal
            // hitung pemasukan sampai sebelum data dibuat
            $pemasukan_sampai_sebelum_data_dibuat = Pemasukan::where('tipe', $this->keuanganAktif)
                ->where('created_at', '<', $pemasukans[$i]->created_at)
                ->sum('nominal');
            // hitung pengeluaran sampai sebelum data dibuat
            $pengeluaran_sampai_sebelum_data_dibuat = Pengeluaran::where('tipe', $this->keuanganAktif)
                ->where('created_at', '<', $pemasukans[$i]->created_at)
                ->sum('nominal');
            // hitung saldo awal
            $saldo_awal = $pemasukan_sampai_sebelum_data_dibuat - $pengeluaran_sampai_sebelum_data_dibuat;
            // masukan sebagai atribut tambahan ke array pemasukans
            $pemasukans[$i]->perhitungan_saldo_awal = $saldo_awal;
            // hitung saldo akhir
            $pemasukans[$i]->perhitungan_saldo_akhir = $saldo_awal + $pemasukans[$i]->nominal;
        }
        return view('livewire.dashboard.keuangan.pemasukan.table', compact('pemasukans'));
    }
}
