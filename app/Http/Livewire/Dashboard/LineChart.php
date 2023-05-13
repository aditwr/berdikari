<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class LineChart extends Component
{
    public $id_chart;
    public $label;
    public $nominal_keuangan_bulan_ini;
    public $daftar_tanggal_bulan_ini;
    public $container_class;
    public $title;
    public $bulanAktif;
    public $tahunAktif;

    protected $bulan = [
        '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April',
        '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus',
        '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
    ];

    // listener for refresh chart
    protected $listeners = [
        'initMonthChart' => 'initDataForChart',
        'refreshMonthChart' => 'updateDataForChart',
    ];

    public function initDataForChart($data)
    {
        $this->dispatchBrowserEvent('initMonthChart', [
            'nominal_keuangan_bulan_ini' => $data['nominal_keuangan_bulan_ini'],
            'daftar_tanggal_bulan_ini' => $data['daftar_tanggal_bulan_ini'],
            'label' => $data['label'],
        ]);
    }

    public function updateDataForChart($data)
    {
        // dispatch event to refresh chart
        $this->dispatchBrowserEvent('refreshMonthChart', [
            'nominal_keuangan_bulan_ini' => $data['nominal_keuangan_bulan_ini'],
            'daftar_tanggal_bulan_ini' => $data['daftar_tanggal_bulan_ini'],
            'label' => $data['label'],
            'bulanAktif' => $data['bulanAktif'],
            'tahunAktif' => $data['tahunAktif'],
        ]);
    }

    public function render()
    {
        $bulan_aktif = $this->bulan[$this->bulanAktif];
        return view('livewire.dashboard.line-chart', compact('bulan_aktif'));
    }
}
