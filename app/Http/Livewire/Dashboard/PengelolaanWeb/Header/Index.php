<?php

namespace App\Http\Livewire\Dashboard\PengelolaanWeb\Header;

use App\Models\Header;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    public $foto1, $foto2, $foto3;
    public $tulisan_header1, $tulisan_header2, $tulisan_header3;
    public $notification = ['status' => false, 'title' => '', 'message' => ''];

    protected $listeners = [
        'refresh' => '$refresh',
    ];

    public function mount()
    {
        $this->getTulisanHeader();
    }

    public function updatedFoto1()
    {
        $this->validate([
            'foto1' => 'image|max:5120', // 5MB Max
        ]);
    }
    public function updatedFoto2()
    {
        $this->validate([
            'foto2' => 'image|max:5120', // 5MB Max
        ]);
    }
    public function updatedFoto3()
    {
        $this->validate([
            'foto3' => 'image|max:5120', // 5MB Max
        ]);
    }

    public function storeFoto1()
    {
        $this->validate([
            'foto1' => 'image|max:5120', // 5MB Max
        ]);
        $this->foto1->storeAs('foto-header', 'foto1.jpg', 'public');
        // refresh component
        redirect()->route('dashboard.pengelolaan-web.header.index');
    }
    public function storeFoto2()
    {
        $this->validate([
            'foto2' => 'image|max:5120', // 5MB Max
        ]);
        $this->foto2->storeAs('foto-header', 'foto2.jpg', 'public');
        // refresh component
        redirect()->route('dashboard.pengelolaan-web.header.index');
    }
    public function storeFoto3()
    {
        $this->validate([
            'foto3' => 'image|max:5120', // 5MB Max
        ]);
        $this->foto3->storeAs('foto-header', 'foto3.jpg', 'public');
        // refresh component
        redirect()->route('dashboard.pengelolaan-web.header.index');
    }
    public function resetFoto($nama_foto)
    {
        if (file_exists(storage_path('app/public/foto-header/' . $nama_foto . '.jpg'))) {
            unlink(storage_path('app/public/foto-header/' . $nama_foto . '.jpg'));
        }
        redirect()->route('dashboard.pengelolaan-web.header.index');
    }
    public function getTulisanHeader()
    {
        $header = Header::all();
        $this->tulisan_header1 = $header[0]->tulisan_header;
        $this->tulisan_header2 = $header[1]->tulisan_header;
        $this->tulisan_header3 = $header[2]->tulisan_header;
    }
    public function updateTulisanHeader($no)
    {
        $header = Header::find($no);
        $header->tulisan_header = $this->tulisan_header1;
        $header->save();
        $this->emit('refresh');
        $this->notification = [
            'status' => true,
            'title' => 'Proses update berhasil!',
            'message' => 'Tulisan header ' . $no . ' berhasil diupdate',
        ];
    }

    public function render()
    {
        return view('livewire.dashboard.pengelolaan-web.header.index');
    }
}
