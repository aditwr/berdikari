<?php

namespace Database\Seeders;

use App\Models\Keuangan;
use Illuminate\Database\Seeder;

class KeuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Keuangan::create([
            'nama' => 'Kas Karangtaruna',
            'slug' => 'kas-karangtaruna',
        ]);
        Keuangan::create([
            'nama' => 'Kas RT 12',
            'slug' => 'kas-rt-12',
        ]);
        Keuangan::create([
            'nama' => 'Kas RT 34',
            'slug' => 'kas-rt-34',
        ]);
    }
}
