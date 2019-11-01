<?php

namespace App\Http\Controllers\ManajemenPersekolah;

use App\AgendaKegiatan;
use App\AgendaSekolah;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AgendaController extends Controller
{
    public function index($tingkat) {
        $agenda = AgendaSekolah::where('tingkat', $tingkat)->first();
        $kegiatan = AgendaKegiatan::where('tingkat', $tingkat)->get();
        return view('admin.manajemen_persekolah.agenda.index', compact('agenda', 'tingkat','kegiatan' ));
    }

    public function update_poster_penerimaan_siswa_baru($tingkat, Request $request) {
        $request->validate([
            'poster_penerimaan_siswa_baru' => 'required|mimes:jpg,jpeg,png'
        ]);
        $agenda = AgendaSekolah::where('tingkat', $tingkat)->first();
        if($agenda->url_poster_penerimaan_siswa_baru) {
            $url_exploded = explode('/', $agenda->url_poster_penerimaan_siswa_baru);
            $path = implode('/', [ $url_exploded[4], $url_exploded[5] ]);
            Storage::disk('public_uploads')->delete($path);
        }
        $agenda->url_poster_penerimaan_siswa_baru = $this->fileHandler($request->file('poster_penerimaan_siswa_baru'))['url'];
        $agenda->save();
        return redirect(url()->previous())->with('success', 'Poster penerimaan siswa baru berhasil diupdate.');
    }

    public function update_kalender_pendidikan($tingkat, Request $request) {
        $request->validate([
            'kalender_pendidikan' => 'required|mimes:jpg,jpeg,png'
        ]);
        $agenda = AgendaSekolah::where('tingkat', $tingkat)->first();
        if($agenda->url_kalender_pendidikan) {
            $url_exploded = explode('/', $agenda->url_kalender_pendidikan);
            $path = implode('/', [ $url_exploded[4], $url_exploded[5] ]);
            Storage::disk('public_uploads')->delete($path);
        }
        $agenda->url_kalender_pendidikan = $this->fileHandler($request->file('kalender_pendidikan'), 'kalender-pendidikan')['url'];
        $agenda->save();
        return redirect(url()->previous())->with('success', 'Kalender pendidikan berhasil diupdate.');
    }

    public function destroy(Request $request) {
        if($request->url) {
            $url_exploded = explode('/', $request->url);
            $path = implode('/', [ $url_exploded[4], $url_exploded[5] ]);
            Storage::disk('public_uploads')->delete($path);
        }

        return response('success', 200);
    }

    public function fileHandler($file, $directory = 'agenda') {
        $originalName = $file->getClientOriginalName();
        $arrayOfName = explode('.', $originalName);
        $name = uniqid().'.'.$arrayOfName[count($arrayOfName)-1];
        $url = url('/uploads/'.$directory.'/'.$name);
        // $path = $directory;
        Storage::disk('public_uploads')->putFileAs($directory, $file, $name);
        return [ 'url' => $url,  'name' => $name];
    }
}
