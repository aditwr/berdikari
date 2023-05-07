<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class DoughnutChart extends Component
{
    public $id_chart;
    public $label;
    public $container_class;

    public $labels;
    public $data;

    protected $listeners = [
        'refreshDoughnutChart' => 'refreshDoughnutChart',
    ];

    public function refreshDoughnutChart($data)
    {
        $this->dispatchBrowserEvent('refreshDoughnutChart', [
            'labels' => $data['labels'],
            'data' => $data['data'],
        ]);
    }

    public function render()
    {
        return view('livewire.components.doughnut-chart');
    }
}
