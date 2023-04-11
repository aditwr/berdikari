<?php

namespace Database\Seeders;

use App\Models\Pemasukan;
use Illuminate\Database\Seeder;

class PemasukanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pemasukan::create([
            'keuangan_id' => 1,
            'tipe' => 'kas-karangtaruna',
            'judul' => "Margin penarikan uang pajak",
            'nominal' => 300000,
            'tanggal' => now(),
            'total_nominal' => 5500000,
            'keterangan' => 'Pemasukan Kas Karangtaruna dari kegiatan A',
        ]);

        Pemasukan::create([
            'keuangan_id' => 1,
            'tipe' => 'kas-karangtaruna',
            'judul' => "Margin penarikan uang Arisan",
            'nominal' => 340000,
            'tanggal' => now(),
            'total_nominal' => 5500000,
            'keterangan' => 'Pemasukan Kas Karangtaruna dari kegiatan A',
        ]);

        Pemasukan::create([
            'keuangan_id' => 1,
            'tipe' => 'kas-karangtaruna',
            'judul' => "Margin penarikan uang Pamsimas",
            'nominal' => 200000,
            'tanggal' => now(),
            'total_nominal' => 5500000,
            'keterangan' => 'Pemasukan Kas Karangtaruna dari kegiatan A',
        ]);
        Pemasukan::create([
            'keuangan_id' => 1,
            'tipe' => 'kas-karangtaruna',
            'judul' => "Margin penarikan uang Pamsimas",
            'nominal' => 90000,
            'tanggal' => now(),
            'total_nominal' => 5500000,
            'keterangan' => 'Pemasukan Kas Karangtaruna dari kegiatan A',
        ]);
        Pemasukan::create([
            'keuangan_id' => 1,
            'tipe' => 'kas-karangtaruna',
            'judul' => "Margin penarikan uang Pamsimas",
            'nominal' => 320000,
            'tanggal' => now(),
            'total_nominal' => 5500000,
            'keterangan' => 'Pemasukan Kas Karangtaruna dari kegiatan A',
        ]);
        Pemasukan::create([
            'keuangan_id' => 1,
            'tipe' => 'kas-karangtaruna',
            'judul' => "Margin penarikan uang Pamsimas",
            'nominal' => 800000,
            'tanggal' => now(),
            'total_nominal' => 5500000,
            'keterangan' => 'Pemasukan Kas Karangtaruna dari kegiatan A',
        ]);
        Pemasukan::create([
            'keuangan_id' => 1,
            'tipe' => 'kas-karangtaruna',
            'judul' => "Margin penarikan uang Pamsimas",
            'nominal' => 800000,
            'tanggal' => now(),
            'total_nominal' => 5500000,
            'keterangan' => 'Pemasukan Kas Karangtaruna dari kegiatan A',
        ]);
        Pemasukan::create([
            'keuangan_id' => 1,
            'tipe' => 'kas-karangtaruna',
            'judul' => "Margin penarikan uang Pamsimas",
            'nominal' => 320000,
            'tanggal' => now(),
            'total_nominal' => 5500000,
            'keterangan' => 'Pemasukan Kas Karangtaruna dari kegiatan A',
        ]);





        Pemasukan::create([
            'keuangan_id' => 2,
            'tipe' => 'kas-rt-12',
            'judul' => "Margin penarikan Pamsimas",
            'nominal' => 200000,
            'tanggal' => now(),
            'total_nominal' => 3400000,
            'keterangan' => 'Pemasukan Kas RT 12 dari kegiatan B',
        ]);

        Pemasukan::create([
            'keuangan_id' => 3,
            'tipe' => 'kas-rt-34',
            'judul' => "Dana sisa dari kegiatan bersih-bersih masjid",
            'nominal' => 100000,
            'tanggal' => now(),
            'total_nominal' => 4400000,
            'keterangan' => 'Pemasukan Kas RT 34 dari kegiatan C',
        ]);
    }
}
