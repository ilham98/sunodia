<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wali', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('registrasi_siswa_id')->unsigned();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->string('kewarganegaraan');
            $table->string('pendidikan_terakhir');
            $table->string('pekerjaan_jabatan');
            $table->string('alamat_lengkap');
            $table->string('no_telepon');
            $table->string('keterangan');
            $table->tinyInteger('penghasilan_perbulan');

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
        Schema::dropIfExists('wali');
    }
}
