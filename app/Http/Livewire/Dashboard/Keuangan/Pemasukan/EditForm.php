<?php

namespace App\Http\Livewire\Dashboard\Keuangan\Pemasukan;

use Livewire\Component;
use App\Models\Keuangan;
use App\Models\Pemasukan;
use App\Models\RiwayatKeuangan;

class EditForm extends Component
{
    public $keuanganAktif;

    public $pemasukanId;
    public $judulPemasukan;
    public $nominalPemasukan;
    public $keteranganPemasukan;

    public $notification = [
        'show' => false,
        'judul' => '',
    ];

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
        // $this->judulPemasukan = $pemasukan['judul'];
        $this->nominalPemasukan = $pemasukan['nominal'];
        // $this->keteranganPemasukan = $pemasukan['keterangan'];
    }

    public function update()
    {
        // validasi
        $this->validate();

        // untuk pencatatan keuangan yang sinkron dan konsisten, maka nominal pemasukan lama tidak boleh diubah
        Pemasukan::find($this->pemasukanId)->update([
            'judul' => $this->judulPemasukan,
            'nominal' => $this->nominalPemasukan,
            'keterangan' => $this->keteranganPemasukan,
        ]);

        $this->notification['show'] = true;
        $this->notification['judul'] = $this->judulPemasukan;

        // $this->emit('pemasukanCreated');
        $this->emit('refreshTable');

        $this->reset(['judulPemasukan', 'nominalPemasukan', 'keteranganPemasukan']);
    }

    public function closeNotification()
    {
        $this->notification['show'] = false;
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
