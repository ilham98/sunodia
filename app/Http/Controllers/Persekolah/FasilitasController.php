<?php

namespace App\Http\Controllers\Persekolah;

use App\Fasilitas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function index($tingkat) {
        $fasilitas = Fasilitas::where('tingkat', $tingkat)->first()->text;
        return view('persekolah.fasilitas', compact('tingkat', 'fasilitas'));
    }
}
