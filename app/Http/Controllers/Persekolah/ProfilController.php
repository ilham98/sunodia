<?php

namespace App\Http\Controllers\Persekolah;

use App\ProfilSekolah;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index($tingkat) {
        $profil = ProfilSekolah::where('tingkat', $tingkat)->first()->text;
        return view('persekolah.profil', compact('tingkat', 'profil'));
    }
}
