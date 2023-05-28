<?php

namespace App\Http\Livewire\Dashboard\Catatan\Kelola;

use Livewire\Component;

class Index extends Component
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
        return view('livewire.dashboard.catatan.kelola.index');
    }
}
