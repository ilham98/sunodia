<?php

namespace App\Http\Controllers\ManajemenPersekolah;

use App\Prestasi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
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
            'nama_lomba' => 'required',
            'foto' => 'required|mimes:jpg,png,jpeg'
        ]);

        Prestasi::create(array_merge($request->all(), ['tingkat' => $tingkat, 'url' => $this->fileHandler($request->file('foto'))['url'] ]));

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
            'nama_lomba' => 'required',
            'foto' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        

        $prestasi = Prestasi::find($id);

        $body = $request->all();

        if($request->foto) {
            if($prestasi->url) {
                $url_exploded = explode('/', $prestasi->url);
                $path = implode('/', [ $url_exploded[4], $url_exploded[5] ]);
                Storage::disk('public_uploads')->delete($path);
            }

            $body = array_merge($body, ['url' => $this->fileHandler($request->file('foto'))['url'] ]);
        };

        $prestasi->update($body);

        return redirect(url('a/'.$tingkat.'/prestasi'))->with('success', 'Prestasi berhasil diupdate.');
    }

    public function destroy($tingkat, $id) {
        $prestasi = Prestasi::find($id);
        $prestasi->delete();

        return redirect(url('a/'.$tingkat.'/prestasi'))->with('success', 'Prestasi berhasil dihapus.');
    }

    public function fileHandler($file, $directory = 'prestasi') {
        $originalName = $file->getClientOriginalName();
        $arrayOfName = explode('.', $originalName);
        $name = uniqid().'.'.$arrayOfName[count($arrayOfName)-1];
        $url = url('/uploads/'.$directory.'/'.$name);
        // $path = $directory;
        Storage::disk('public_uploads')->putFileAs($directory, $file, $name);
        return [ 'url' => $url,  'name' => $name];
    }
}
