<?php

namespace App\Http\Controllers\ManajemenPersekolah;

use App\Album;
use App\Photo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index($tingkat) {
        $album = Album::where('tingkat', $tingkat)->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.manajemen_persekolah.galeri.index', compact('album', 'tingkat'));
    }

    public function single($tingkat, $id) {
        $album = Album::find($id);
        $photos = $album->photos;
        return view('admin.manajemen_persekolah.galeri.single', compact('album', 'photos', 'tingkat'));
    }

    public function update($id, Request $request) {
        $album = Album::find($id);
        $album->update($request->all());

        return redirect(url()->previous())->with('success', 'Nama album berhasil diupdate.');
    }

    public function create($tingkat) {
        return view('admin.manajemen_persekolah.galeri.create', compact('tingkat'));
    }

    public function store($tingkat, Request $request) {
        $album = Album::create(array_merge($request->all(), ['tingkat' => $tingkat]));
        return redirect(url('a/'.$tingkat.'/galeri/'.$album->id))->with('success', 'Album berhasil ditambahkan.');
    }

    public function destroy($id) {
        $album = Album::find($id);
        $album->delete();

        return redirect(url()->previous())->with('success', 'Album berhasil dihapus.');;
    }

    public function photo_destroy($id, $photo_id) {
        $photo = Photo::find($photo_id);
        $url_exploded = explode('/', $photo->url);
        $path = implode('/', [ $url_exploded[4], $url_exploded[5] ]);
        Storage::disk('public_uploads')->delete($path);
        $photo->delete();
        return redirect(url()->previous());
    }

    public function photo_store($tingkat, $id, Request $request) {
        $request->validate([
            'photo' => 'required|mimes:jpg,png,jpeg',
            'caption' => 'required'
        ]);

        $foto_size = getimagesize($request->photo);
        $width = $foto_size[0];
        $height = $foto_size[1];

        Photo::create([
            'album_id' => $id,
            'width' => $width,
            'height' => $height,
            'url' => $this->fileHandler($request->file('photo'))['url'],
            'caption' => $request->caption
        ]);

        return redirect(url()->previous());
    }

    public function fileHandler($file, $directory = 'galeri') {
        $originalName = $file->getClientOriginalName();
        $arrayOfName = explode('.', $originalName);
        $name = uniqid().'.'.$arrayOfName[count($arrayOfName)-1];
        $url = url('/uploads/'.$directory.'/'.$name);
        // $path = $directory;
        Storage::disk('public_uploads')->putFileAs($directory, $file, $name);
        return [ 'url' => $url,  'name' => $name];
    }
}
