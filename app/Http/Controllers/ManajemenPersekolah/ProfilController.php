<?php

namespace App\Http\Controllers\ManajemenPersekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index($tingkat) {
        $berita = Berita::where('tingkat', $tingkat)->orderBy('id', 'desc')->paginate(20);
        return view('admin.manajemen.berita.index', compact('berita', 'tingkat'));
    }

    public function create($tingkat) {
        return view('admin.manajemen.berita.create', compact('tingkat'));
    }

    public function edit($tingkat, $id) {
        $berita = Berita::find($id);
        return view('admin.manajemen.berita.edit', compact('berita', 'tingkat'));
    }
}
