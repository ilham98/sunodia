<?php

namespace App\Http\Controllers\Admin;

use App\Konfigurasi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KonfigurasiController extends Controller
{
    public function index() {
        $konfigurasi = Konfigurasi::first();
        return view('admin.konfigurasi', compact('konfigurasi'));
    }

    public function update(Request $request) {
        $request->validate([
            'tahun_pembelajaran' => 'required|digits:4'
        ]);

        $konfigurasi = Konfigurasi::first();
        $konfigurasi->update($request->all());

        return redirect(url()->previous())->with('success', 'Konfigurasi berhasil diupdate');
    }
}
