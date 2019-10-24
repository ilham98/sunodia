<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('registrasi_siswa_id')->unsigned();
            $table->bigInteger('jenis_dokumen_id')->unsigned();
            $table->string('url')->nullable();

            $table->foreign('registrasi_siswa_id')->references('id')->on('registrasi_siswa');
            $table->foreign('jenis_dokumen_id')->references('id')->on('jenis_dokumen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumen');
    }
}
