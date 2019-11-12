<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\Photo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index() {
        $album = Album::where('tingkat', null)->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.galeri.index', compact('album'));
    }

    public function single($id) {
        $album = Album::find($id);
        $photos = $album->photos;
        return view('admin.galeri.single', compact('album', 'photos'));
    }

    public function update($id, Request $request) {
        $album = Album::find($id);
        $album->update($request->all());

        return redirect(url()->previous())->with('success', 'Nama album berhasil diupdate.');
    }

    public function create() {
        return view('admin.galeri.create');
    }

    public function store(Request $request) {
        $album = Album::create($request->all());
        return redirect(url('a/galeri/'.$album->id))->with('success', 'Album berhasil ditambahkan.');
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

    public function photo_store($id, Request $request) {
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
