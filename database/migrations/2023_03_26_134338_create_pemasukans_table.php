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
            $table->bigInteger('saldo_awal');
            $table->bigInteger('saldo_akhir');
            $table->string('keterangan')->nullable();
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
