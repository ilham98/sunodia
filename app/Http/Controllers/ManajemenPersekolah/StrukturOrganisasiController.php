<?php

namespace App\Http\Controllers\ManajemenPersekolah;

use App\StrukturOrganisasi;
use App\Guru;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturOrganisasiController extends Controller
{
    public function index($tingkat) {
        $struktur_organisasi = StrukturOrganisasi::where('tingkat', $tingkat)->first();
        $guru = Guru::where('tingkat', $tingkat)->get();
        return view('admin.manajemen_persekolah.struktur_organisasi.index', compact('struktur_organisasi', 'tingkat','guru' ));
    }

    public function update($tingkat, Request $request) {
        $request->validate([
            'struktur_organisasi' => 'required'
        ]);
        $struktur_organisasi = StrukturOrganisasi::where('tingkat', $tingkat)->first();
        $struktur_organisasi->url = $this->fileHandler($request->file('struktur_organisasi'))['url'];
        $struktur_organisasi->save();
        return redirect(url()->previous())->with('success', 'Gambar struktur organisasi berhasil diupdate.');
    }

    public function fileHandler($file, $directory = 'struktur_organisasi') {
        $originalName = $file->getClientOriginalName();
        $arrayOfName = explode('.', $originalName);
        $name = uniqid().'.'.$arrayOfName[count($arrayOfName)-1];
        $url = url('/uploads/'.$directory.'/'.$name);
        // $path = $directory;
        Storage::disk('public_uploads')->putFileAs($directory, $file, $name);
        return [ 'url' => $url,  'name' => $name];
    }
}
