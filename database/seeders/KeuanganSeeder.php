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
            'nominal' => 5000000,
        ]);
        Keuangan::create([
            'nama' => 'Kas RT 12',
            'slug' => 'kas-rt-12',
            'nominal' => 3200000,
        ]);
        Keuangan::create([
            'nama' => 'Kas RT 34',
            'slug' => 'kas-rt-34',
            'nominal' => 4300000,
        ]);
    }
}
