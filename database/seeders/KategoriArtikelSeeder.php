<?php

namespace Database\Seeders;

use App\Models\KategoriArtikel;
use Illuminate\Database\Seeder;

class KategoriArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KategoriArtikel::create([
            'slug' => 'berita',
            'nama' => 'Berita',
        ]);
        // info menarik
        KategoriArtikel::create([
            'slug' => 'info-menarik',
            'nama' => 'Info Menarik',
        ]);

        // kesehatan
        KategoriArtikel::create([
            'slug' => 'kesehatan',
            'nama' => 'Kesehatan',
        ]);
    }
}
