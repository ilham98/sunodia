<?php

namespace App\Http\Controllers\Managemen;

use App\Berita;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BeritaController extends Controller
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

    public function store($tingkat, Request $request) {
        $request->validate([
            'title' => 'required|min:10',
            'body' => 'required'
        ]);

        $berita = new Berita;
        $berita->judul = $request->title;
        $berita->isi = $request->body;
        $berita->tingkat = $tingkat;
        $berita->save();
        
        return redirect(url('/a/'.$tingkat.'/berita'))->with('success', 'Berita berhasil ditambahkan.');
    }

    public function update($tingkat, $id, Request $request) {
        $request->validate([
            'title' => 'required|min:10',
            'body' => 'required'
        ]);

        $berita = Berita::find($id);
        $berita->judul = $request->title;
        $berita->isi = $request->body;
        $berita->tingkat = $tingkat;
        $berita->save();
        
        return redirect(url('/a/'.$tingkat.'/berita'))->with('success', 'Berita berhasil diupdate.');
    }

    public function destroy($tingkat, $id) {
        $berita = Berita::find($id);
        $berita->delete();

        return redirect(url('/a/'.$tingkat.'/berita'))->with('success', 'Berita berhasil dihapus.');
    }
}
