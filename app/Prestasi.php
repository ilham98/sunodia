<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $table = 'prestasi';
    protected $fillable = ['nama', 'juara', 'nama_lomba', 'tingkat', 'tingkat_lomba', 'url'];
}
