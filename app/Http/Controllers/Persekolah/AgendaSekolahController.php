<?php

namespace App\Http\Controllers\Persekolah;

use App\AgendaSekolah;
use App\AgendaKegiatan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgendaSekolahController extends Controller
{
    public function index($tingkat) {
        $agenda = AgendaSekolah::where('tingkat', $tingkat)->first();
        $kegiatan = AgendaKegiatan::where('tingkat', $tingkat)->get();
        return view('persekolah.agenda', compact('agenda', 'tingkat','kegiatan' ));
    }
}
