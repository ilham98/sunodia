<?php

namespace App\Http\Controllers\Profil;

use App\Profil;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MarsController extends Controller
{
    public function index() {
        $profil = Profil::first();
        return view('admin.profil.mars.index', compact('profil'));
    }

    public function update(Request $request) {
        $profil = Profil::first();
        $profil->mars = $request->mars;
        $profil->save();

        return redirect(url()->previous())->with('success', 'Update Mars Sukses');
    }
}
