<?php

namespace App\Http\Livewire\Dashboard\Beranda;

use App\Models\Artikel;
use Livewire\Component;

class ArtikelSummary extends Component
{
    public function render()
    {
        $artikel_bulan_ini = Artikel::whereMonth('created_at', date('m'));
        $jumlah_artikel_bulan_ini = $artikel_bulan_ini->count();
        $artikel_bulan_ini = $artikel_bulan_ini->paginate(4, pageName: 'artikel_page');
        return view('livewire.dashboard.beranda.artikel-summary', compact(['jumlah_artikel_bulan_ini', 'artikel_bulan_ini']));
    }
}
