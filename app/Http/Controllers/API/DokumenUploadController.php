<?php

namespace App\Http\Controllers\API;

use App\Dokumen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class DokumenUploadController extends Controller
{
    public function upload(Request $request) {
        $reg_token = $request->cookie('registrasi_token');
        $reg_id = Crypt::decryptString($request->cookie('registrasi_token'));
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png'
        ]);

        $url = Dokumen::find($request->id)->url;

        
        if($url) {
            $url_exploded = explode('/', $url);
            $path = implode('/', [ $url_exploded[4], $url_exploded[5] ]);
            Storage::disk('public_uploads')->delete($path);
        }

        $file = $this->fileHandler($request->file('file'));
        Dokumen::where(['id' => $request->id])->update(['url' => $file['url']]);
        return response($file, 200);
    }

    public function fileHandler($file, $directory = 'dokumen') {
        $originalName = $file->getClientOriginalName();
        $arrayOfName = explode('.', $originalName);
        $name = uniqid().'.'.$arrayOfName[count($arrayOfName)-1];
        $url = url('/uploads/'.$directory.'/'.$name);
        // $path = $directory;
        Storage::disk('public_uploads')->putFileAs($directory, $file, $name);
        return [ 'url' => $url,  'name' => $name];
    }
}
