<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_catatan_id')->constrained('jenis_catatans')->onDelete('cascade');
            $table->string('judul');
            $table->text('isi');
            $table->string('pembuat');
            $table->timestamps();
            $table->timestamp('modified_at')->nullable();
            $table->timestamp('modified_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catatans');
    }
}
