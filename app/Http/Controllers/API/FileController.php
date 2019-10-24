<?php

namespace App\Http\Controllers\API;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    public function upload(Request $request) {
        $request->validate([
            'file' => 'required'
        ]);
        // return 'aaa';
        // return response(, 200);
        $file = File::create([
            'url' => $this->fileHandler($request->file('file'))['url']
        ]);

        return $file;
    }

    public function destroy(Request $request) {
        if($request->url) {
            $url_exploded = explode('/', $request->url);
            $path = implode('/', [ $url_exploded[4], $url_exploded[5] ]);
            Storage::disk('public_uploads')->delete($path);
        }

        return response('success', 200);
    }

    public function fileHandler($file, $directory = 'files') {
        $originalName = $file->getClientOriginalName();
        $arrayOfName = explode('.', $originalName);
        $name = uniqid().'.'.$arrayOfName[count($arrayOfName)-1];
        $url = url('/uploads/'.$directory.'/'.$name);
        // $path = $directory;
        Storage::disk('public_uploads')->putFileAs($directory, $file, $name);
        return [ 'url' => $url,  'name' => $name];
    }
}
