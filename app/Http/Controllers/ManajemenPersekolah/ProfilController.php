<?php

namespace App\Http\Controllers\ManajemenPersekolah;

use App\ProfilSekolah;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index($tingkat) {
        $profil = ProfilSekolah::where('tingkat', $tingkat)->first();
        return view('admin.manajemen_persekolah.profil.index', compact('profil', 'tingkat'));
    }

    public function update($tingkat, Request $request) {
        $profil = ProfilSekolah::where('tingkat', $tingkat)->first();
        $profil->text = $request->text;
        $profil->save();
        return redirect(url('/a/'.$tingkat.'/profil'))->with('success', 'Profil berhasil diupdate.');
    }
}
