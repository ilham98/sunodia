<?php

namespace App\Http\Controllers\Manajemen;

use App\Berita;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index() {
        $berita = Berita::where('tingkat', null)->orderBy('id', 'desc')->paginate(20);
        return view('admin.manajemen.berita.index', compact('berita'));
    }

    public function create() {
        return view('admin.manajemen.berita.create');
    }

    public function edit($id) {
        $berita = Berita::find($id);
        return view('admin.manajemen.berita.edit', compact('berita'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|min:10',
            'body' => 'required'
        ]);

        $berita = new Berita;
        $berita->judul = $request->title;
        $berita->isi = $request->body;
        $berita->save();
        
        return redirect(url('/a/berita'))->with('success', 'Berita berhasil ditambahkan.');
    }

    public function update($id, Request $request) {
        $request->validate([
            'title' => 'required|min:10',
            'body' => 'required'
        ]);

        $berita = Berita::find($id);
        $berita->judul = $request->title;
        $berita->isi = $request->body;
        $berita->save();
        
        return redirect(url('/a/berita'))->with('success', 'Berita berhasil diupdate.');
    }

    public function destroy($id) {
        $berita = Berita::find($id);
        $berita->delete();

        return redirect(url('/a/berita'))->with('success', 'Berita berhasil dihapus.');
    }
}
