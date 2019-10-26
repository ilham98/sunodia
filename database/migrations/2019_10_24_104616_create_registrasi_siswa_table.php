<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrasiSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrasi_siswa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('agama')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('bergereja_di')->nullable();
            $table->string('aktif_pelayan')->nullable();
            $table->string('alamat_rumah')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('telepon')->nullable();
            $table->string('tinggal_dengan')->nullable();
            $table->string('no_hp_calon_siswa')->nullable();
            $table->string('email_calon_siswa')->nullable();
            $table->integer('anak_ke')->nullable();
            $table->integer('jumlah_saudara')->nullable();
            $table->integer('jarak_tempuh_sekolah')->nullable();
            $table->integer('waktu_tempuh_sekolah')->nullable();
            $table->string('alat_tempuh_sekolah')->nullable();
            $table->integer('tingkat')->nullable();
            $table->string('golongan_darah')->nullable();
            $table->string('rhesus')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('alamat_sekolah')->nullable();
            $table->string('nomor_ijazah')->nullable();
            $table->integer('lama_belajar')->nullable();
            $table->float('jumlah_nilai_ijazah')->nullable();
            $table->integer('pernah_melakukan_donor')->nullable();
            $table->float('tinggi_badan')->nullable();
            $table->float('berat_badan')->nullable();
            $table->string('penyakit_yang_pernah_diderita')->nullable();
            $table->string('berkebutuhan_khusus')->nullable();
            $table->string('ciri_khusus_lainnya')->nullable();
            $table->string('tinggal_bersama')->nullable();
            $table->string('last_step')->nullable();
            $table->integer('saved')->default(0);
            $table->timestamp('saved_date')->nullable();
            $table->timestamps();
        });
    }

    /**3
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrasi_siswa');
    }
}
