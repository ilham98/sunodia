<?php

namespace App\Http\Controllers\ManajemenPersekolah;

use App\Prestasi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index($tingkat) {
        $prestasi = Prestasi::where('tingkat', $tingkat)->orderBy('id', 'desc')->paginate(20);
        return view('admin.manajemen_persekolah.prestasi.index', compact('prestasi', 'tingkat'));
    }

    public function create($tingkat) {
        return view('admin.manajemen_persekolah.prestasi.create', compact('tingkat'));
    }

    public function store($tingkat, Request $request) {
        $request->validate([
            'nama' => 'required',
            'tingkat_lomba' => 'required',
            'juara' => 'required',
            'nama_lomba' => 'required'
        ]);

        Prestasi::create(array_merge($request->all(), ['tingkat' => $tingkat]));

        return redirect(url('a/'.$tingkat.'/prestasi'))->with('success', 'Prestasi berhasil ditambahkan');
    }

    public function edit($tingkat, $id, Request $request) {
        $prestasi = Prestasi::find($id);
        return view('admin.manajemen_persekolah.prestasi.edit', compact('tingkat', 'prestasi'));
    }

    public function update($tingkat, $id, Request $request) {
        $request->validate([
            'nama' => 'required',
            'tingkat_lomba' => 'required',
            'juara' => 'required',
            'nama_lomba' => 'required'
        ]);

        $prestasi = Prestasi::find($id);
        $prestasi->update($request->all());

        return redirect(url('a/'.$tingkat.'/prestasi'))->with('success', 'Prestasi berhasil diupdate.');
    }

    public function destroy($tingkat, $id) {
        $prestasi = Prestasi::find($id);
        $prestasi->delete();

        return redirect(url('a/'.$tingkat.'/prestasi'))->with('success', 'Prestasi berhasil dihapus.');
    }
}
