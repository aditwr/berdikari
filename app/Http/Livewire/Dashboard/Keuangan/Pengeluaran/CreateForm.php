<?php

namespace App\Http\Livewire\Dashboard\Keuangan\Pengeluaran;

use Livewire\Component;
use App\Models\Keuangan;
use App\Models\Pengeluaran;
use App\Models\RiwayatKeuangan;

class CreateForm extends Component
{
    public $keuanganAktif;

    public $judulPengeluaran;
    public $nominalPengeluaran;
    public $keteranganPengeluaran;

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
        'judulPengeluaran' => 'required',
        'nominalPengeluaran' => 'required',
    ];

    public function submit()
    {
        // if validation success, do
        $this->validate();

        // hitung nominal keuangan terbaru
        $nominal_terbaru = $this->keuanganAktif->nominal - $this->nominalPengeluaran;

        // buat pengeluaran baru
        Pengeluaran::create([
            'keuangan_id' => $this->keuanganAktif->id,
            'tipe' => $this->keuanganAktif->slug,
            'judul' => $this->judulPengeluaran,
            'nominal' => $this->nominalPengeluaran,
            'tanggal' => date('Y-m-d'),
            'keterangan' => $this->keteranganPengeluaran,
            'sisa_nominal' => $nominal_terbaru,
        ]);

        // update total nominal di keuangan
        $this->keuanganAktif->update([
            'nominal' => $nominal_terbaru,
        ]);

        // update riwayat keuangan
        RiwayatKeuangan::create([
            'keuangan_id' => $this->keuanganAktif->id,
            'nominal' => $nominal_terbaru,
            'tipe' => $this->keuanganAktif->slug,
            'tanggal' => date('Y-m-d'),
        ]);

        $this->notification['show'] = true;
        $this->notification['judul'] = $this->judulPengeluaran;

        $this->emit('pengeluaranCreated');
        $this->emit('refreshTable');

        $this->reset(['judulPengeluaran', 'nominalPengeluaran', 'keteranganPengeluaran']);
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
        return view('livewire.dashboard.keuangan.pengeluaran.create-form');
    }
}
