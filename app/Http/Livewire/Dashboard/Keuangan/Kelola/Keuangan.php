<?php

namespace App\Http\Livewire\Dashboard\Keuangan\Kelola;

use Livewire\Component;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;

class Keuangan extends Component
{
    public $search;
    public $notification = ['status' => false, 'title' => '', 'message' => ''];
    protected $listeners = [
        'notification' => 'showNotification',
    ];

    public function showNotification($data)
    {
        $this->notification = [
            'status' => true,
            'title' => $data['title'],
            'message' => $data['message'],
        ];
    }
    public function updatedSearch()
    {
        $this->emit('search', $this->search);
    }

    public function render()
    {
        return view('livewire.dashboard.keuangan.kelola.keuangan');
    }
}
