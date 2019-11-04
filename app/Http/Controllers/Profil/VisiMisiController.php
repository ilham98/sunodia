<?php

namespace App\Http\Controllers\Profil;

use App\Profil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VisiMisiController extends Controller
{
    public function index() {
        $profil = Profil::first();
        return view('admin.profil.visi-misi.index', compact('profil'));
    }

    public function update(Request $request) {
        $profil = Profil::first();
        $profil->visi = $request->visi;
        $profil->misi = $request->misi;
        $profil->nilai = $request->nilai;
        $profil->save();

        return redirect(url()->previous())->with('success', 'Update Visi & Misi Sukses');
    }
}
