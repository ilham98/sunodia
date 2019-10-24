<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saudara extends Model
{
    protected $table = 'saudara';
    protected $fillable = ['registrasi_siswa_id', 'saudara_nama', 'saudara_umur', 'saudara_pendidikan', 'saudara_status'];
    public $timestamps = false;
}
