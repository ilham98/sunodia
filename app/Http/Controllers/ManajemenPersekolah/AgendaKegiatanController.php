<?php

namespace App\Http\Controllers\ManajemenPersekolah;

use App\AgendaKegiatan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgendaKegiatanController extends Controller
{
    public function store($tingkat, Request $request) {
        $request->validate([
            'nama' => 'required',
            'tanggal_mulai_pelaksanaan' => 'required',
            'tanggal_selesai_pelaksanaan' => 'required',
            'pelaksana' => 'required' 
        ]);

        AgendaKegiatan::create(array_merge($request->all(), ['tingkat' => $tingkat]));
        return redirect(url()->previous())->with('success', 'kegiatan berhasil ditambahkan');
    }

    public function destroy($tingkat, $id) {
        $agenda = AgendaKegiatan::find($id);
        $agenda->delete();
        return redirect(url()->previous())->with('success', 'kegiatan berhasil dihapus');
    }
}
