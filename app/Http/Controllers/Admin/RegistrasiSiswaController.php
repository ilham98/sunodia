<?php

namespace App\Http\Controllers\Admin;

use App\RegistrasiSiswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistrasiSiswaController extends Controller
{
    public function index(Request $request) {
        $reg = RegistrasiSiswa::where('saved', 1);
        if($request->tahun_pembelajaran) {
            $reg = $reg->where('tahun_pembelajaran', $request->tahun_pembelajaran);
        }
        if($request->jenjang) {
            $reg = $reg->where('tingkat', $request->jenjang);
        }
        if($request->dari_tanggal) {
            $reg = $reg->where('saved_date', '>=', $request->dari_tanggal);
        }

        if($request->hingga_tanggal) {
            $reg = $reg->where('saved_date', '<=', $request->hingga_tanggal);
        }
        $reg = $reg->paginate(10);  
        $tahun_pembelajaran = RegistrasiSiswa::where('saved', 1)->orderBy('tahun_pembelajaran', 'desc')->get()->map(function($tp) {
            return $tp->tahun_pembelajaran;
        })->unique();
        return view('admin.registrasi_siswa.index', compact('reg', 'tahun_pembelajaran', 'request'));
    }

    public function getNamaTingkat($tingkat) {
        switch($tingkat) {
            case 1:
                return 'KB';
            case 2:
                return 'TK';
            case 3:
                return 'SD';
            case 4:
                return 'SMP';
            case 5:
                return 'SMA';
        }
    }

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

    public function single($id) {
        $reg = RegistrasiSiswa::find($id);
        $tingkat = $this->getNamaTingkat($reg->tingkat);
        $saudara = $reg->saudara;
        $kegemaran = $reg->kegemaran_prestasi()->where('jenis_', 'kegemaran')->get();
        $prestasi = $reg->kegemaran_prestasi()->where('jenis_', 'prestasi')->get();
        $ayah = $reg->orang_tua()->where('jenis', 'ayah')->first();
        $ibu = $reg->orang_tua()->where('jenis', 'ibu')->first();
        $wali = $reg->wali()->first();
        $penghasilan_ayah = $ayah ? $this->getPenghasilanPerbulan($ayah->penghasilan_perbulan) : null;
        $penghasilan_ibu = $ibu ? $this->getPenghasilanPerbulan($ibu->penghasilan_perbulan) : null;
        $penghasilan_wali = $wali ? $this->getPenghasilanPerbulan($wali->penghasilan_perbulan) : null;
        $dokumen = $reg->dokumen;
        return view('admin.registrasi_siswa.single', 
            compact(
                'reg', 
                'tingkat', 
                'saudara', 
                'kegemaran', 
                'prestasi', 
                'ayah', 
                'ibu', 
                'wali',
                'penghasilan_ayah',
                'penghasilan_ibu',
                'penghasilan_wali',
                'dokumen'
            )
        );
    }
}
