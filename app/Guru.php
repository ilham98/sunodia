<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    protected $fillable = ['nama', 'jabatan', 'pengampu_mata_pelajaran', 'tingkat'];
    public $timestamps = false;
}
