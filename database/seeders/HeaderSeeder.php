<?php

namespace Database\Seeders;

use App\Models\Header;
use Illuminate\Database\Seeder;

class HeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Header::create([
            'tulisan_header' => 'Selamat datang di Karangtaruna! Kami adalah sebuah organisasi pemuda yang bertujuan untuk memperkuat solidaritas dan keterlibatan masyarakat di lingkungan sekitar.',
        ]);
        Header::create([
            'tulisan_header' => 'Selamat datang di Karangtaruna! Kami adalah sebuah organisasi pemuda yang bertujuan untuk memperkuat solidaritas dan keterlibatan masyarakat di lingkungan sekitar.',
        ]);
        Header::create([
            'tulisan_header' => 'Selamat datang di Karangtaruna! Kami adalah sebuah organisasi pemuda yang bertujuan untuk memperkuat solidaritas dan keterlibatan masyarakat di lingkungan sekitar.',
        ]);
    }
}
