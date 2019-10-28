<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgendaSekolah extends Model
{
    protected $table = 'agenda_sekolah';
    protected $fillable = ['url_poster_penerimaan_siswa_baru', 'url_kalender_pendidikan', 'tingkat'];
    public $timestamps = false;
}
