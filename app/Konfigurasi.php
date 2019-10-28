<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konfigurasi extends Model
{
    protected $table = 'konfigurasi';
    protected $fillable = ['tahun_pembelajaran', 'registrasi_open'];
    public $timestamps = false;
}
