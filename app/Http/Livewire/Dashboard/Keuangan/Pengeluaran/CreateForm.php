<?php

namespace App\Http\Livewire\Dashboard\Keuangan\Pengeluaran;

use Livewire\Component;
use App\Models\Keuangan;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\RiwayatKeuangan;

class CreateForm extends Component
{
    public $keuanganAktif;

    public $judulPengeluaran;
    public $nominalPengeluaran;
    public $keteranganPengeluaran;

    protected $listeners = [
        'KeuanganAktifUpdatedFromSelect' => 'updateKeuanganAktifFromSelect',
    ];

    public function mount()
    {
        $this->keuanganAktif = Keuangan::all()->first();
    }

    protected $rules = [
        'judulPengeluaran' => 'required',
        'nominalPengeluaran' => 'required',
    ];

    public function submit()
    {
        // if validation success, do
        $this->validate();

        // hitung saldo terakhir
        $totalPemasukan = Pemasukan::where('keuangan_id', $this->keuanganAktif->id)->sum('nominal');
        $totalPengeluaran = Pengeluaran::where('keuangan_id', $this->keuanganAktif->id)->sum('nominal');
        $saldoTerakhir = $totalPemasukan - $totalPengeluaran;

        // buat pengeluaran baru
        Pengeluaran::create([
            'keuangan_id' => $this->keuanganAktif->id,
            'tipe' => $this->keuanganAktif->slug,
            'judul' => $this->judulPengeluaran,
            'nominal' => $this->nominalPengeluaran,
            'saldo_awal' => $saldoTerakhir, // saldo awal adalah saldo terakhir
            'saldo_akhir' => $saldoTerakhir - $this->nominalPengeluaran, // kurangi saldo terakhir dengan nominal pengeluaran
            'keterangan' => $this->keteranganPengeluaran,
        ]);

        $this->emit('pengeluaranCreated');
        $this->emit('refreshTable');

        $this->reset(['judulPengeluaran', 'nominalPengeluaran', 'keteranganPengeluaran']);
        $this->dispatchBrowserEvent('create-pengeluaran-success', ['title' => 'Sukses!', 'message' => 'Pengeluaran berhasil ditambahkan!']);
    }

    public function updateKeuanganAktifFromSelect($data)
    {
        $this->keuanganAktif = $data['keuanganAktif'];
        $this->keuanganAktif = Keuangan::where('slug', $data['keuanganAktif'])->first();
    }

    public function render()
    {
        return view('livewire.dashboard.keuangan.pengeluaran.create-form');
    }
}
