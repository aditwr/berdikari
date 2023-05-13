<?php

namespace App\Http\Livewire\Dashboard\Keuangan\Pemasukan;

use Livewire\Component;
use App\Models\Keuangan;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;

class EditForm extends Component
{
    public $keuanganAktif;

    public $pemasukanId;
    public $judulPemasukan;
    public $nominalPemasukan;
    public $keteranganPemasukan;

    protected $listeners = [
        'KeuanganAktifUpdatedFromSelect' => 'updateKeuanganAktifFromSelect',
        'setUpdate' => 'setUpdate',
    ];

    public function mount()
    {
        $this->keuanganAktif = Keuangan::all()->first();
    }

    protected $rules = [
        'judulPemasukan' => 'required',
        'nominalPemasukan' => 'required',
    ];

    public function setUpdate($pemasukan)
    {
        $this->pemasukanId = $pemasukan['id'];
        $this->judulPemasukan = $pemasukan['judul'];
        $this->nominalPemasukan = $pemasukan['nominal'];
        $this->keteranganPemasukan = $pemasukan['keterangan'];
    }

    public function update()
    {
        // validasi
        $this->validate();

        $pemasukan = Pemasukan::find($this->pemasukanId);
        // hitung saldo awal, akumulasi sampai pada tanggal
        $pemasukan_sampai_tanggal = Pemasukan::where('keuangan_id', $this->keuanganAktif->id)->where('created_at', "<", $pemasukan->created_at)->sum('nominal');
        $pengeluaran_sampai_tanggal = Pengeluaran::where('keuangan_id', $this->keuanganAktif->id)->where('created_at', "<", $pemasukan->created_at)->sum('nominal');
        $saldo_awal = $pemasukan_sampai_tanggal - $pengeluaran_sampai_tanggal;
        $saldo_akhir = $saldo_awal + $this->nominalPemasukan;

        $judul_pemasukan_lama = $pemasukan->judul;

        $pemasukan->update([
            'judul' => $this->judulPemasukan,
            'nominal' => $this->nominalPemasukan,
            'saldo_awal' => $saldo_awal,
            'saldo_akhir' => $saldo_akhir,
            'keterangan' => $this->keteranganPemasukan,
        ]);

        $this->emit('refresh');
        $this->emit('refreshTable');
        $this->emit('notification', ['title' => 'Ubah data berhasil!', 'message' => 'Pemasukan dengan judul "<span class="font-medium" >' . $judul_pemasukan_lama . '</span>" telah diubah!']);
        $this->reset(['judulPemasukan', 'nominalPemasukan', 'keteranganPemasukan']);
    }

    public function updateKeuanganAktifFromSelect($data)
    {
        $this->keuanganAktif = $data['keuanganAktif'];
        $this->keuanganAktif = Keuangan::where('slug', $data['keuanganAktif'])->first();
    }

    public function render()
    {
        return view('livewire.dashboard.keuangan.pemasukan.edit-form');
    }
}
