<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengeluaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('keuangan_id')->constrained('keuangans')->onDelete('cascade');
            $table->string('tipe');
            // judul pengeluaran dengan maksimal 255 karakters
            $table->string('judul', 255);
            $table->bigInteger('nominal');
            $table->date('tanggal');
            $table->bigInteger('sisa_nominal');
            $table->string('keterangan');
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
        Schema::dropIfExists('pengeluarans');
    }
}
