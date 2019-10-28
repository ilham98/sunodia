<?php

namespace App\Http\Controllers\ManajemenPersekolah;

use App\Guru;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function create($tingkat) {
        return view('admin.manajemen_persekolah.guru.create', compact('tingkat'));
    }

    public function store($tingkat, Request $request) {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'pengampu_mata_pelajaran' => 'required'
        ]);

        $body = array_merge($request->all(), ['tingkat' => $tingkat]);
        Guru::create($body);

        return redirect(url('a/'.$tingkat.'/struktur-organisasi'))->with('success', 'Guru berhasil ditambahkan');
    }

    public function edit($tingkat, $id) {
        $guru = Guru::find($id);
        return view('admin.manajemen_persekolah.guru.edit', compact('tingkat', 'guru'));
    }

    public function update($tingkat, $id, Request $request) {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'pengampu_mata_pelajaran' => 'required'
        ]);

        $guru = Guru::find($id);
        $body = array_merge($request->all(), ['tingkat' => $tingkat]);
        $guru->update($body);

        return redirect(url('a/'.$tingkat.'/struktur-organisasi'))->with('success', 'Guru berhasil diupdate');
    }

    public function destroy($tingkat, $id) {
        $guru = Guru::find($id);
        $guru->delete();

        return redirect(url('a/'.$tingkat.'/struktur-organisasi'))->with('success', 'Guru berhasil dihapus');;
    }
}
