<?php

namespace App\Http\Livewire\Dashboard\Keuangan\Pemasukan;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Keuangan;
use App\Models\Pemasukan;

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
    public $notification = ['status' => false, 'title' => '', 'message' => ''];


    protected $listeners = [
        'KeuanganAktifUpdated' => 'updateKeuanganAktif',
        'KeuanganAktifUpdatedFromSelect' => 'updateKeuanganAktifFromSelect',
        'refreshTable' => '$refresh',
        'refresh' => '$refresh',
        'notification' => 'showNotification',
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

    public function showNotification($data)
    {
        $this->notification = [
            'status' => true,
            'title' => $data['title'],
            'message' => $data['message'],
        ];
    }

    public function deleteItem()
    {
        $pemasukan = Pemasukan::find($this->deleteId);
        $this->emitSelf('notification', ['title' => 'Penghapusan berhasil', 'message' => 'Pemasukan dengan judul "<span class="font-medium" >' . $pemasukan->judul . '</span>" berhasil dihapus!']);
        $pemasukan->delete();
        $this->emit('refreshTable');
        $this->emit('refresh');
    }

    public function setUpdate($pemasukan)
    {
        $this->emit('setUpdate', $pemasukan);
    }

    public function render()
    {
        $pemasukans = $this->getPemasukan();
        return view('livewire.dashboard.keuangan.pemasukan.table', compact('pemasukans'));
    }
}
