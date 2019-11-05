<?php

namespace App\Http\Controllers\Persekolah;

use App\Album;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index($tingkat) {
        $album = Album::orderBy('created_at', 'desc')->where(function($query) use($tingkat){
            $query->where('tingkat', $tingkat);
        })->whereHas('photos')->paginate(4);
        return view('persekolah.galeri', compact('album', 'tingkat'));
    }
}
