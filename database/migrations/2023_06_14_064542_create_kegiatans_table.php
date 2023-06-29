<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            // judul kegiatan
            $table->string('judul_kegiatan');
            // gambar kegiatan
            $table->string('gambar');
            // penulis kegiatan
            $table->string('penulis');
            // deskripsi kegiatan (kemungkinan panjang)
            $table->text('deskripsi');
            // jumlah views
            $table->integer('views')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kegiatans');
    }
}
