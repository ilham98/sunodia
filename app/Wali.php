<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wali extends Model
{
    protected $table = 'wali';
    protected $fillable = [
        'registrasi_siswa_id',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'kewarganegaraan',
        'pendidikan_terakhir',
        'pekerjaan_jabatan',
        'alamat_lengkap',
        'no_telepon',
        'keterangan',
        'penghasilan_perbulan'
    ];
    public $timestamps = false;
}
