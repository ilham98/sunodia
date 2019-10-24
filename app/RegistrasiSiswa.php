<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistrasiSiswa extends Model
{
    protected $table = 'registrasi_siswa';
    protected $fillable = [
// ------------------------------ FORM 1 ------------------------------
        'tingkat',
// ------------------------------ FORM 2 ------------------------------
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'kewarganegaraan',
        'alamat_rumah',
        'kode_pos',
        'telepon',
        'tinggal_dengan',
        'no_hp_calon_siswa',
        'email_calon_siswa',
        'anak_ke',
        'jumlah_saudara',
        'jarak_tempuh_sekolah',
        'waktu_tempuh_sekolah',
        'alat_tempuh_sekolah',
// ------------------------------ FORM 3 ------------------------------
        'asal_sekolah',
        'alamat_sekolah',
        'nomor_ijazah',
        'lama_belajar',
        'jumlah_nilai_ijazah',
// ------------------------------ FORM 4 ------------------------------
        'golongan_darah',
        'pernah_melakukan_donor',
        'penyakit_yang_pernah_diderita',
        'berkebutuhan_khusus',
        'tinggi_badan',
        'berat_badan',
        'ciri_khusus_lainnya',
// ------------------------------ FORM 6 ------------------------------
        'tinggal_bersama',
// ------------------------------ OTHER ------------------------------
        'last_step',
        'saved'
    ];

    public function dokumen() {
        return $this->hasMany('App\Dokumen', 'registrasi_siswa_id', 'id');
    }

    public function saudara() {
        return $this->hasMany('App\Saudara', 'registrasi_siswa_id', 'id');
    }

    public function kegemaran_prestasi() {
        return $this->hasMany('App\KegemaranPrestasi', 'registrasi_siswa_id', 'id');
    }

    public function orang_tua() {
        return $this->hasMany('App\OrangTua', 'registrasi_siswa_id', 'id');
    }

    public function wali() {
        return $this->hasMany('App\Wali', 'registrasi_siswa_id', 'id');
    }
}
