<?php

namespace App\Http\Controllers\ManajemenPersekolah;

use App\Fasilitas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function index($tingkat) {
        $fasilitas = Fasilitas::where('tingkat', $tingkat)->first();
        return view('admin.manajemen_persekolah.fasilitas.index', compact('fasilitas', 'tingkat'));
    }

    public function update($tingkat, Request $request) {
        $fasilitas = Fasilitas::where('tingkat', $tingkat)->first();
        $fasilitas->text = $request->text;
        $fasilitas->save();
        return redirect(url('/a/'.$tingkat.'/fasilitas'))->with('success', 'Fasilitas berhasil diupdate.');
    }
}
