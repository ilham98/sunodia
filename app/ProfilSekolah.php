<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilSekolah extends Model
{
    protected $table = 'profil_sekolah';
    protected $fillable = ['text'];
    public $timestamps = false;
}
