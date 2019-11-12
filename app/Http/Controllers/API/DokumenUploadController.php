<?php

namespace App\Http\Controllers\API;

use App\Dokumen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class DokumenUploadController extends Controller
{
    public function upload(Request $request) {
        $reg_token = $request->cookie('registrasi_token');
        $reg_id = Crypt::decryptString($request->cookie('registrasi_token'));
        if($request->file('file')) {
            $ext = $request->file('file')->getClientOriginalExtension();
            if(!in_array($ext, ['jpg','jpeg','png'])) {
                return response('error', 500);
            }
        }

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

        try {
            $url_exploded = explode('/', $file['url']);
            $ext = explode('.', $url_exploded[count($url_exploded)-1])[1];
            if(!in_array($ext, ['jpg','jpeg','png'])) {
                $path = implode('/', [ $url_exploded[4], $url_exploded[5]]);
                Storage::disk('public_uploads')->delete($path);
                throw new \Exception();
            }
        } catch(\Exception $e) {
            return response('error', 500);
        }

        Dokumen::where(['id' => $request->id])->update(['url' => $file['url']]);
        return response($file, 200);
    }

    public function fileHandler($file, $directory = 'dokumen') {
        // dapatin nama file asli
        $originalName = $file->getClientOriginalName();
        $image = image::make($file->getRealPath());
        $foto_size = getimagesize($file);
        $width = $foto_size[0];
        $height = $foto_size[1];
        $ratio = 90;
        // explode biar mempermudah dapatkan extensi
        $arrayOfName = explode('.', $originalName);
        // hash nama dan sambungkan dengan extensi sebelumnya
        $name = uniqid().'.'.$arrayOfName[count($arrayOfName)-1];
        //resize image
        $resize_image = $image->resize($width*($ratio/100), $height*($ratio/100), function($constraint) {
            $constraint->aspectRatio();
        })->save(public_path('/uploads/'.$directory.'/'.$name));
        // generate url
        $url = url('/uploads/'.$directory.'/'.$name);
        return [ 'url' => $url,  'name' => $name];
    }
}
