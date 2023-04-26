<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemasukansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemasukans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('keuangan_id')->constrained('keuangans')->onDelete('cascade');
            $table->string('tipe');
            // judul pemasukan dengan maksimal 255 karakter
            $table->string('judul', 255);
            $table->bigInteger('nominal');
            $table->date('tanggal');
            $table->bigInteger('total_nominal');
            $table->string('keterangan')->nullable();
            $table->foreignId('riwayat_keuangan_id')->nullable()->constrained('riwayat_keuangans')->onDelete('cascade');
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
        Schema::dropIfExists('pemasukans');
    }
}
