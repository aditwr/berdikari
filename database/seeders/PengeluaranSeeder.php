<?php

namespace Database\Seeders;

use App\Models\Pengeluaran;
use Illuminate\Database\Seeder;

class PengeluaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengeluaran::create([
            'keuangan_id' => 1,
            'tipe' => 'kas-karangtaruna',
            'judul' => "Beli Bola Voli",
            'nominal' => 300000,
            'tanggal' => now(),
            'sisa_nominal' => 5500000,
            'keterangan' => 'Pengeluaran Kas Karangtaruna dari kegiatan A',
        ]);

        Pengeluaran::create([
            'keuangan_id' => 1,
            'tipe' => 'kas-karangtaruna',
            'judul' => "Beli Bola Basket",
            'nominal' => 200000,
            'tanggal' => now(),
            'sisa_nominal' => 5300000,
            'keterangan' => 'Pengeluaran Kas Karangtaruna dari kegiatan A',
        ]);
        Pengeluaran::create([
            'keuangan_id' => 1,
            'tipe' => 'kas-karangtaruna',
            'judul' => "Beli Konsumsi Rapat Panitia Ramadhan",
            'nominal' => 200000,
            'tanggal' => now(),
            'sisa_nominal' => 5300000,
            'keterangan' => 'Pengeluaran Kas Karangtaruna dari kegiatan A',
        ]);


        Pengeluaran::create([
            'keuangan_id' => 1,
            'tipe' => 'kas-karangtaruna',
            'judul' => "Beli Bola Futsal",
            'nominal' => 100000,
            'tanggal' => now(),
            'sisa_nominal' => 5200000,
            'keterangan' => 'Pengeluaran Kas Karangtaruna dari kegiatan A',
        ]);
        Pengeluaran::create([
            'keuangan_id' => 1,
            'tipe' => 'kas-karangtaruna',
            'judul' => "Beli Bola Voli",
            'nominal' => 300000,
            'tanggal' => now(),
            'sisa_nominal' => 5500000,
            'keterangan' => 'Pengeluaran Kas Karangtaruna dari kegiatan A',
        ]);

        Pengeluaran::create([
            'keuangan_id' => 1,
            'tipe' => 'kas-karangtaruna',
            'judul' => "Beli Bola Basket",
            'nominal' => 200000,
            'tanggal' => now(),
            'sisa_nominal' => 5300000,
            'keterangan' => 'Pengeluaran Kas Karangtaruna dari kegiatan A',
        ]);
        Pengeluaran::create([
            'keuangan_id' => 1,
            'tipe' => 'kas-karangtaruna',
            'judul' => "Beli Konsumsi Rapat Panitia Ramadhan",
            'nominal' => 200000,
            'tanggal' => now(),
            'sisa_nominal' => 5300000,
            'keterangan' => 'Pengeluaran Kas Karangtaruna dari kegiatan A',
        ]);


        Pengeluaran::create([
            'keuangan_id' => 1,
            'tipe' => 'kas-karangtaruna',
            'judul' => "Beli Bola Futsal",
            'nominal' => 100000,
            'tanggal' => now(),
            'sisa_nominal' => 5200000,
            'keterangan' => 'Pengeluaran Kas Karangtaruna dari kegiatan A',
        ]);

        Pengeluaran::create([
            'keuangan_id' => 2,
            'tipe' => 'kas-rt-12',
            'judul' => "Beli bahan makanan untuk acara bersih masjid",
            'nominal' => 300000,
            'tanggal' => now(),
            'sisa_nominal' => 3600000,
            'keterangan' => 'Pengeluaran Kas RT 12 dari kegiatan B',
        ]);


        Pengeluaran::create([
            'keuangan_id' => 2,
            'tipe' => 'kas-rt-12',
            'nominal' => 200000,
            'judul' => "Dana konsumsi acara bersih masjid",
            'tanggal' => now(),
            'sisa_nominal' => 3400000,
            'keterangan' => 'Pengeluaran Kas RT 12 dari kegiatan B',
        ]);

        Pengeluaran::create([
            'keuangan_id' => 3,
            'tipe' => 'kas-rt-34',
            'judul' => "Belanja bahan makanan untuk bakar-bakar bersama",
            'nominal' => 100000,
            'tanggal' => now(),
            'sisa_nominal' => 4400000,
            'keterangan' => 'Pengeluaran Kas RT 34 dari kegiatan C',
        ]);
    }
}
