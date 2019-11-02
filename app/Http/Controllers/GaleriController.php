<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index() {
        $album = Album::orderBy('created_at', 'desc')->where(function($query) {
            $query->where('tingkat', '')->orWhere('tingkat', null);
        })->whereHas('photos')->paginate(4);
        return view('public.galeri', compact('album'));
    }
}
