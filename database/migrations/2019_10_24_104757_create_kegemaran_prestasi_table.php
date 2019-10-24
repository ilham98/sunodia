<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegemaranPrestasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegemaran_prestasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('registrasi_siswa_id')->unsigned();
            $table->string('nama');
            $table->string('jenis');
            $table->string('jenis_');
            $table->foreign('registrasi_siswa_id')->references('id')->on('registrasi_siswa');
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
        Schema::dropIfExists('kegemaran_prestasi');
    }
}
