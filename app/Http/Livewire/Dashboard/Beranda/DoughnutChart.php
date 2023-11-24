<?php

namespace App\Http\Livewire\Dashboard\Beranda;

use Livewire\Component;
use App\Models\Keuangan;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;

class DoughnutChart extends Component
{
    public $ringkasanKeuangan = [];

    public function hitungRingkasanKeuangan()
    {
        $daftar_keuangan = Keuangan::all();
        $labels_keuangan = [];
        $data_keuangan = [];
        for ($i = 0; $i < count($daftar_keuangan); $i++) {
            $pemasukan = Pemasukan::where('tipe', $daftar_keuangan[$i]->slug)->sum('nominal');
            $pengeluaran = Pengeluaran::where('tipe', $daftar_keuangan[$i]->slug)->sum('nominal');
            $saldo = $pemasukan - $pengeluaran;
            array_push($labels_keuangan, $daftar_keuangan[$i]->nama);
            array_push($data_keuangan, $saldo);
        }
        $this->ringkasanKeuangan = [
            'labels' => $labels_keuangan,
            'data' => $data_keuangan
        ];

        // $this->emit('initDoughnutChart', $this->ringkasanKeuangan);
    }
    public function render()
    {
        // hitung  ringkasan keuangan
        $this->hitungRingkasanKeuangan();
        $ringkasanKeuangan = $this->ringkasanKeuangan;
        // hitung total saldo
        $saldo_keuangan = [];
        $daftar_keuangan = Keuangan::all();
        $total_saldo_karangtaruna = 0;
        for ($i = 0; $i < count($daftar_keuangan); $i++) {
            $pemasukan = Pemasukan::where('tipe', $daftar_keuangan[$i]->slug)->sum('nominal');
            $pengeluaran = Pengeluaran::where('tipe', $daftar_keuangan[$i]->slug)->sum('nominal');
            $saldo = $pemasukan - $pengeluaran;
            $daftar_keuangan[$i]->saldo = $saldo;
            $total_saldo_karangtaruna += $saldo;
        }
        return view('livewire.dashboard.beranda.doughnut-chart', compact(['ringkasanKeuangan', 'total_saldo_karangtaruna', 'daftar_keuangan']));
    }
}
