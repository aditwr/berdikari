<?php

namespace App\Http\Livewire\Dashboard\Keuangan\Pengeluaran;

use Livewire\Component;
use App\Models\Keuangan;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;

class EditForm extends Component
{
    public $keuanganAktif;

    public $pengeluaranId;
    public $judulPengeluaran;
    public $nominalPengeluaran;
    public $keteranganPengeluaran;

    protected $listeners = [
        'KeuanganAktifUpdatedFromSelect' => 'updateKeuanganAktifFromSelect',
        'setUpdate' => 'setUpdate',
    ];

    public function mount()
    {
        $this->keuanganAktif = Keuangan::all()->first();
    }

    protected $rules = [
        'judulPengeluaran' => 'required',
        'nominalPengeluaran' => 'required',
    ];

    public function setUpdate($pengeluaran)
    {
        $this->pengeluaranId = $pengeluaran['id'];
        $this->judulPengeluaran = $pengeluaran['judul'];
        $this->nominalPengeluaran = $pengeluaran['nominal'];
        $this->keteranganPengeluaran = $pengeluaran['keterangan'];
    }

    public function update()
    {
        // validasi
        $this->validate();

        $pengeluaran = Pengeluaran::find($this->pengeluaranId);
        // hitung saldo awal, akumulasi sampai pada tanggal
        $pemasukan_sampai_tanggal = Pemasukan::where('keuangan_id', $this->keuanganAktif->id)->where('created_at', "<", $pengeluaran->created_at)->sum('nominal');
        $pengeluaran_sampai_tanggal = Pengeluaran::where('keuangan_id', $this->keuanganAktif->id)->where('created_at', "<", $pengeluaran->created_at)->sum('nominal');
        $saldo_awal = $pemasukan_sampai_tanggal - $pengeluaran_sampai_tanggal;
        $saldo_akhir = $saldo_awal - $this->nominalPengeluaran;

        $judul_pengeluaran_lama = $pengeluaran->judul;
        $pengeluaran->update([
            'judul' => $this->judulPengeluaran,
            'nominal' => $this->nominalPengeluaran,
            'saldo_awal' => $saldo_awal,
            'saldo_akhir' => $saldo_akhir,
            'keterangan' => $this->keteranganPengeluaran,
        ]);

        $this->emit('refresh');
        $this->emit('refreshTable');
        $this->emit('notification', ['title' => 'Ubah data berhasil!', 'message' => 'Pengeluaran dengan judul "<span class="font-medium" >' . $judul_pengeluaran_lama . '</span>" telah diubah!']);
        $this->reset(['judulPengeluaran', 'nominalPengeluaran', 'keteranganPengeluaran']);
    }

    public function updateKeuanganAktifFromSelect($data)
    {
        $this->keuanganAktif = $data['keuanganAktif'];
        $this->keuanganAktif = Keuangan::where('slug', $data['keuanganAktif'])->first();
    }

    public function render()
    {
        return view('livewire.dashboard.keuangan.pengeluaran.edit-form');
    }
}
