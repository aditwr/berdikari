<?php

namespace App\Http\Livewire\Dashboard\Keuangan\Pemasukan;

use Livewire\Component;
use App\Models\Keuangan;
use App\Models\Pemasukan;
use App\Models\RiwayatKeuangan;
use RealRashid\SweetAlert\Facades\Alert;

class CreateForm extends Component
{
    public $keuanganAktif;

    public $judulPemasukan;
    public $nominalPemasukan;
    public $keteranganPemasukan;

    public $notification = [
        'show' => false,
        'judul' => '',
    ];

    protected $listeners = [
        'KeuanganAktifUpdatedFromSelect' => 'updateKeuanganAktifFromSelect',
    ];

    public function mount()
    {
        $this->keuanganAktif = Keuangan::all()->first();
    }

    protected $rules = [
        'judulPemasukan' => 'required',
        'nominalPemasukan' => 'required',
    ];

    public function submit()
    {
        // if validation success, do
        $this->validate();

        // hitung nominal keuangan terbaru
        $nominal_terbaru = $this->keuanganAktif->nominal + $this->nominalPemasukan;

        // buat pemasukan baru
        Pemasukan::create([
            'keuangan_id' => $this->keuanganAktif->id,
            'tipe' => $this->keuanganAktif->slug,
            'judul' => $this->judulPemasukan,
            'nominal' => $this->nominalPemasukan,
            'tanggal' => date('Y-m-d'),
            'keterangan' => $this->keteranganPemasukan,
            'total_nominal' => $nominal_terbaru,
        ]);

        // update total nominal di keuangan
        $this->keuanganAktif->update([
            'nominal' => $nominal_terbaru,
        ]);

        // simpan nominal ke riwayat keuangan
        RiwayatKeuangan::create([
            'keuangan_id' => $this->keuanganAktif->id,
            'nominal' => $nominal_terbaru,
            'tipe' => $this->keuanganAktif->slug,
            'tanggal' => date('Y-m-d'),
        ]);

        $this->notification['show'] = true;
        $this->notification['judul'] = $this->judulPemasukan;

        $this->emit('pemasukanCreated');
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
        return view('livewire.dashboard.keuangan.pemasukan.create-form');
    }
}
