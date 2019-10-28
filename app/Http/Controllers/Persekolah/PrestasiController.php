<?php

namespace App\Http\Controllers\Persekolah;

use App\Prestasi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index($tingkat) {
        $prestasi = Prestasi::where('tingkat', $tingkat)->get();
        return view('persekolah.prestasi.index', compact('tingkat', 'prestasi'));
    }

    public function create($tingkat) {
        return view('persekolah.prestasi.create', compact('tingkat'));
    }
}
