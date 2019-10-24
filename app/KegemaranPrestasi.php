<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KegemaranPrestasi extends Model
{
    protected $table = 'kegemaran_prestasi';
    protected $fillable = ['nama', 'registrasi_siswa_id', 'jenis', 'jenis_'];
    public $timestamps = false;
}
