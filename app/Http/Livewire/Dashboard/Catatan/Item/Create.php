<?php

namespace App\Http\Livewire\Dashboard\Catatan\Item;

use App\Models\JenisCatatan;
use Livewire\Component;

class Create extends Component
{
    public $judulCatatan, $isiCatatan, $namaJenisCatatan, $idJenisCatatan;
    public function mount()
    {
        $this->namaJenisCatatan = JenisCatatan::all()->first()->nama;
        $this->idJenisCatatan = JenisCatatan::all()->first()->id;
    }
    public function getDaftarJenisCatatan()
    {
        return JenisCatatan::all();
    }
    public function simpan()
    {
        dd($this->judulCatatan, $this->isiCatatan);
    }
    public function render()
    {
        $daftarJenisCatatan = $this->getDaftarJenisCatatan();
        return view('livewire.dashboard.catatan.item.create', compact(['daftarJenisCatatan']));
    }
}
