<?php

namespace App\Http\Controllers\Persekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index($tingkat) {
        return view('persekolah.prestasi.index', compact('tingkat'));
    }
}
