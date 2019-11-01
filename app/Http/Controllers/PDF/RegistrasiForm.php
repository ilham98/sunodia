<?php

namespace App\Http\Controllers\PDF;

use App\Dokumen;
use App\RegistrasiSiswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistrasiForm extends Controller
{
    public function getPenghasilanPerbulan($penghasilan_perbulan) {
        switch($penghasilan_perbulan) {
            case 1:
                return '< 5.000.000';
            case 2:
                return '5.000.000 - 10.000.000';
            case 3:
                return '10.000.000 - 15.000.000';
            case 4:
                return '> 15.000.000';

        }
    }

    function index($id, Request $request) {
        
        $reg = RegistrasiSiswa::find($id);
        if(!\Auth::check()) {
            $sesi = json_decode($request->cookie('sesi_registrasi'));
            if(!in_array($id, $sesi)) {
                return redirect('/');
            }
        }
        $tingkat = '';
        switch($reg->tingkat) {
            case 1:
                $tingkat = 'KB Kecil';
                break;
            case 2:
                $tingkat = 'KB Besar';
                break;
            case 3:
                $tingkat = 'TK A';
                break;
            case 4:
                $tingkat = 'TK B';
                break;
            case 5:
                $tingkat = 'SD';
                break;
            case 6:
                $tingkat = 'SMP';
                break;
            case 7:
                $tingkat = 'SMA';
                break;
        }

        $foto_siswa = Dokumen::where(['registrasi_siswa_id' => $reg->id, 'jenis_dokumen_id' => 4])->first();
        $foto_siswa = explode('/', $foto_siswa->url);
        $foto_siswa = $foto_siswa[count($foto_siswa)-5].'/'.$foto_siswa[count($foto_siswa)-4].'/'.$foto_siswa[count($foto_siswa)-3].'/'.$foto_siswa[count($foto_siswa)-2].'/'.$foto_siswa[count($foto_siswa)-1];
        $kegemaran = $reg->kegemaran_prestasi()->where('jenis_', 'kegemaran')->get();
        $prestasi = $reg->kegemaran_prestasi()->where('jenis_', 'prestasi')->get();
        $ayah = $reg->orang_tua()->where('jenis', 'ayah')->first();
        $ibu = $reg->orang_tua()->where('jenis', 'ibu')->first();
        $wali = $reg->wali()->first();
        $penghasilan_ayah = $ayah ? $this->getPenghasilanPerbulan($ayah->penghasilan_perbulan) : null;
        $penghasilan_ibu = $ibu ? $this->getPenghasilanPerbulan($ibu->penghasilan_perbulan) : null;
        $penghasilan_wali = $wali ? $this->getPenghasilanPerbulan($wali->penghasilan_perbulan) : null;
        $pdf = \PDF::loadView('pdf.registrasi', compact('reg', 'tingkat', 'kegemaran', 'prestasi', 'ayah', 'ibu', 'wali', 'penghasilan_ayah', 'penghasilan_ibu', 'penghasilan_wali', 'foto_siswa'));
        return $pdf->stream();
    }
}
