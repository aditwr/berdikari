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

    // listener for refresh chart
    protected $listeners = [
        'initMonthChart' => 'initDataForChart',
        'refreshMonthChart' => 'updateDataForChart'
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
        ]);
    }

    public function render()
    {
        return view('livewire.dashboard.line-chart');
    }
}
