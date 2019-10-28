<?php

namespace App\Http\Controllers\Admin;

use App\Highlight;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HighlightController extends Controller
{
    public function index() {
        $highlight = Highlight::orderBy('id', 'asc')->get();
        return view('admin.highlight.index', compact('highlight'));
    }

    public function store(Request $request) {
        $request->validate([
            'id' => 'required',
            'img' => 'required|mimes:jpg,jpeg,png',
            'keterangan' => 'required'
        ]);

        $highlight = Highlight::find($request->id);

        if($highlight) {
            if($highlight->url) {
                $url_exploded = explode('/', $highlight->url);
                $path = implode('/', [ $url_exploded[4], $url_exploded[5] ]);
                Storage::disk('public_uploads')->delete($path);
            }
        }
        

        Highlight::create([
            'id' => $request->id,
            'url' => $this->fileHandler($request->file('img'))['url'],
            'keterangan' => $request->keterangan
        ]);

        return redirect(url()->previous())->with('success', 'Data berhasil ditambahkan');

    }

    public function update() {

    }

    public function fileHandler($file, $directory = 'highlights') {
        $originalName = $file->getClientOriginalName();
        $arrayOfName = explode('.', $originalName);
        $name = uniqid().'.'.$arrayOfName[count($arrayOfName)-1];
        $url = url('/uploads/'.$directory.'/'.$name);
        // $path = $directory;
        Storage::disk('public_uploads')->putFileAs($directory, $file, $name);
        return [ 'url' => $url,  'name' => $name];
    }

    public function destroy($id) {
        $highlight = Highlight::find($id);

        if($highlight) {
            if($highlight->url) {
                $url_exploded = explode('/', $highlight->url);
                $path = implode('/', [ $url_exploded[4], $url_exploded[5] ]);
                Storage::disk('public_uploads')->delete($path);
            }
        }

        $highlight->delete();

        return redirect(url()->previous())->with('success', 'Data berhasil dihapus');
    }
}
