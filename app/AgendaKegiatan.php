<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgendaKegiatan extends Model
{
    protected $table = 'agenda_kegiatan';
    protected $fillable = ['tingkat', 'nama', 'tanggal_mulai_pelaksanaan', 'tanggal_selesai_pelaksanaan', 'pelaksana'];
    public $timestamps = false;
}
