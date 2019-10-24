<?php

namespace App\Http\Controllers;

use App\Profil;
use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
    public function sejarah() {
        $sejarah = Profil::first()->sejarah;
        return view('public.sejarah', compact('sejarah'));
    }

    public function logo() {
        $logo = Profil::first()->logo;
        return view('public.logo', compact('logo'));
    }

    public function visi_misi() {
        $visi = Profil::first()->visi;
        $misi = Profil::first()->misi;
        return view('public.visi_misi', compact('visi', 'misi'));
    }

    public function mars() {
        $mars = Profil::first()->mars;
        return view('public.mars', compact('mars'));
    }
}
