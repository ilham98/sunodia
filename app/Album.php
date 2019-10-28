<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'album';
    protected $fillable = ['nama', 'tingkat'];

    public function photos() {
        return $this->hasMany('App\Photo');
    }
}
