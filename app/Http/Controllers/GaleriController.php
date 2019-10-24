<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index() {
        $album = Album::orderBy('created_at', 'desc')->get();
        return view('public.galeri', compact('album'));
    }
}
