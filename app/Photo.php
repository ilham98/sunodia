<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['url', 'album_id', 'width', 'height', 'caption'];
    public $timestamps = false;
}
