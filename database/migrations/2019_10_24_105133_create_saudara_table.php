<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaudaraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saudara', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('registrasi_siswa_id')->unsigned();
            $table->string('nama');
            $table->string('status');
            $table->foreign('registrasi_siswa_id')->references('id')->on('registrasi_siswa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saudara');
    }
}
