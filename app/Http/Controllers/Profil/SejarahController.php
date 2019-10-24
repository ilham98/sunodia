<?php

namespace App\Http\Controllers\Profil;

use App\Profil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SejarahController extends Controller
{
    public function index() {
        $profil = Profil::first();
        return view('admin.profil.sejarah.index', compact('profil'));
    }

    public function update(Request $request) {
        $profil = Profil::first();
        $profil->sejarah = $request->sejarah;
        $profil->save();

        return redirect(url()->previous())->with('success', 'Update Sejarah Sukses');
    }
}
