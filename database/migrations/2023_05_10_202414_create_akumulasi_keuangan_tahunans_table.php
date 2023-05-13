<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkumulasiKeuanganTahunansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akumulasi_keuangan_tahunans', function (Blueprint $table) {
            $table->id();
            $table->string('tipe');
            $table->integer('tahun');
            $table->bigInteger('total_pemasukan');
            $table->bigInteger('total_pengeluaran');
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
        Schema::dropIfExists('akumulasi_keuangan_tahunans');
    }
}
