<?php

namespace Database\Seeders;

use App\Models\RiwayatKeuangan;
use Illuminate\Database\Seeder;

class RiwayatKeuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            RiwayatKeuangan::create([
                'keuangan_id' => 1,
                'tipe' => 'kas-karangtaruna',
                'nominal' => 1000000 + ($i * 5000),
                // date increase by 1 day
                'tanggal' => now()->addDays($i),
            ]);
        }
    }
}
