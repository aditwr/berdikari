<?php

namespace App\Http\Livewire\Dashboard\Keuangan\Pemasukan;

use Livewire\Component;
use App\Models\Keuangan;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\RiwayatKeuangan;
use RealRashid\SweetAlert\Facades\Alert;

class CreateForm extends Component
{
    public $keuanganAktif;

    public $judulPemasukan;
    public $nominalPemasukan;
    public $keteranganPemasukan;

    protected $listeners = [
        'KeuanganAktifUpdatedFromSelect' => 'updateKeuanganAktifFromSelect',
    ];

    public function mount()
    {
        $this->keuanganAktif = Keuangan::all()->first();
    }

    protected $rules = [
        'judulPemasukan' => 'required',
        'nominalPemasukan' => 'required|numeric',
    ];

    public function submit()
    {
        // if validation success, do
        $this->validate();

        // hitung saldo terakhir
        $totalPemasukan = Pemasukan::where('keuangan_id', $this->keuanganAktif->id)->sum('nominal');
        $totalPengeluaran = Pengeluaran::where('keuangan_id', $this->keuanganAktif->id)->sum('nominal');
        $saldoTerakhir = $totalPemasukan - $totalPengeluaran;

        // buat pemasukan baru
        Pemasukan::create([
            'keuangan_id' => $this->keuanganAktif->id,
            'tipe' => $this->keuanganAktif->slug,
            'judul' => $this->judulPemasukan,
            'nominal' => $this->nominalPemasukan,
            'saldo_awal' => $saldoTerakhir, // saldo awal adalah saldo terakhir
            'saldo_akhir' => $saldoTerakhir + $this->nominalPemasukan, // tambah saldo terakhir dengan nominal pemasukan
            'keterangan' => $this->keteranganPemasukan,
        ]);

        $this->emit('pemasukanCreated');
        $this->emit('refreshTable');

        $this->reset(['judulPemasukan', 'nominalPemasukan', 'keteranganPemasukan']);
        $this->dispatchBrowserEvent('create-pemasukan-success', ['title' => 'Sukses!', 'message' => 'Pemasukan berhasil ditambahkan!']);
    }

    public function updateKeuanganAktifFromSelect($data)
    {
        $this->keuanganAktif = $data['keuanganAktif'];
        $this->keuanganAktif = Keuangan::where('slug', $data['keuanganAktif'])->first();
    }

    public function render()
    {
        return view('livewire.dashboard.keuangan.pemasukan.create-form');
    }
}
