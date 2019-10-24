<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $table = 'dokumen';
    protected $fillable = ['registrasi_siswa_id', 'jenis_dokumen_id', 'nama', 'url']; 
    public $timestamps = false;  

    public function jenis_dokumen() {
        return $this->belongsTo('App\JenisDokumen', 'jenis_dokumen_id');
    }
}
