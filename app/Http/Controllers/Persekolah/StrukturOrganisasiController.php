<?php

namespace App\Http\Controllers\Persekolah;


use App\StrukturOrganisasi;
use App\Guru;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StrukturOrganisasiController extends Controller
{
    public function index($tingkat) {
        $struktur_organisasi = StrukturOrganisasi::where('tingkat', $tingkat)->first();
        $guru = Guru::where('tingkat', $tingkat)->get();
        return view('persekolah.struktur-organisasi', compact('struktur_organisasi', 'tingkat','guru' ));
    }
}
