<?php

namespace App\Http\Controllers;

use App\Konfigurasi;
use App\Wali;
use App\Saudara;
use App\Dokumen;
use App\OrangTua;
use App\JenisDokumen;
use App\RegistrasiSiswa;
use App\KegemaranPrestasi;
use App\Rules\DocumentCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegistrasiController extends Controller
{
    public function __construct (Request $request) { 
        if($request->cookie('registrasi_token'))
            $this->reg_id = Crypt::decryptString($request->cookie('registrasi_token'));
        if($request->cookie('sesi_registrasi')) {
            $this->sesi_registrasi = json_decode(Crypt::decryptString($request->cookie('sesi_registrasi')));
            $this->sesi_registrasi_url = array_map(function($r) {
                return Crypt::encryptString($r);
            }, $this->sesi_registrasi);
        }  
    }

    public function new_session(Request $request) {
        $sesi_registrasi = json_decode($request->cookie('sesi_registrasi'));
        $sesi_belum_selesai = RegistrasiSiswa::where(function($query) use($sesi_registrasi){
            $query->whereIn('id', $sesi_registrasi)->where('saved', 0);
        })->exists();

        if($sesi_belum_selesai) {
            return redirect(url()->previous());
        }

        $konfigurasi = Konfigurasi::first();
        $reg = RegistrasiSiswa::create([
            'last_step' => '1',
            'tahun_pembelajaran' => $konfigurasi->tahun_pembelajaran
        ]);

        
        

        $sesi_registrasi[] = $reg->id;

        return redirect('registrasi')
                ->withCookie(cookie()->forever('registrasi_token', $reg->id))
                ->withCookie(cookie()->forever('sesi_registrasi', json_encode($sesi_registrasi)));
    }

    public function init(Request $request) {
        if($request->move_to_session) {
            $session = Crypt::decryptString($request->move_to_session);
            return redirect('registrasi')
                ->withCookie(cookie()->forever('registrasi_token', $session));
        }

        $reg_token = $request->cookie('registrasi_token');
        $konfigurasi = Konfigurasi::first();
        if(!$reg_token) {
            $reg = RegistrasiSiswa::create([
                'last_step' => '1',
                'tahun_pembelajaran' => $konfigurasi->tahun_pembelajaran
            ]);
            return redirect('registrasi/1')
                ->withCookie(cookie()->forever('registrasi_token', $reg->id))
                ->withCookie(cookie()->forever('sesi_registrasi', json_encode([$reg->id])));
        }
        $id = $request->cookie('registrasi_token');
        $reg = RegistrasiSiswa::find($id);  
        if(!$reg) {
            return redirect('registrasi')->withCookie(\Cookie::forget('registrasi_token'));
        }
        if($request->goto && $reg) {
            if($request->goto == 'next') {
                if($request->from)
                    $reg->last_step = (int)$request->from+1;
                else
                    $reg->last_step = $reg->last_step+1;
            } else {
                if($request->from)
                    $reg->last_step = (int)$request->from-1;
                else
                    $reg->last_step = $reg->last_step-1;
            } 
            $reg->save();
            return redirect('registrasi/'.$reg->last_step);
        } else {
            return redirect('registrasi/'.$reg->last_step);
        }

    }

    public function step1(Request $request) {
        $reg = RegistrasiSiswa::find($this->reg_id);
        $sesi_registrasi_url = $this->sesi_registrasi_url;
        return view('registrasi.step-1', compact('reg', 'sesi_registrasi_url'));
    }

    public function step1_submit(Request $request) {
        $reg = RegistrasiSiswa::find($this->reg_id);
        if($reg->tingkat != $request->tingkat) {
            Dokumen::where('registrasi_siswa_id', $this->reg_id)->delete();
            $reg->tingkat = $tingkat = (int)$request->tingkat;
            $reg->save();
            $jenis_dokumen = new JenisDokumen;
            if(in_array($tingkat, [-3, -2, -1, 0, 1, 2, 3, 4, 5, 6])) {
                $jenis_dokumen = $jenis_dokumen->whereIn('id', [1, 2, 3, 4, 5, 6]);
            } else {
                $jenis_dokumen = $jenis_dokumen->whereIn('id', [1, 2, 3, 4, 7, 8]);
                if(in_array($tingkat, [7, 8, 9])) {
                    $jenis_dokumen = $jenis_dokumen->orWhereIn('id', [9, 10]);
                } else {
                    $jenis_dokumen = $jenis_dokumen->orWhereIn('id', [11, 12, 13]);
                }
            }
            $jenis_dokumen = $jenis_dokumen->get();
            
            foreach($jenis_dokumen as $jd) {
                Dokumen::create([
                    'registrasi_siswa_id' => $this->reg_id,
                    'jenis_dokumen_id' => $jd->id,
                    'url' => null
                ]);
            }
        }
        // foreach($jenis_dokumen)
        
        return redirect(url('registrasi?goto=next&from=1'))->withCookie(cookie()->forever('tingkat', (int)$request->tingkat));
    }

    public function step2(Request $request) {
        $reg = RegistrasiSiswa::find($this->reg_id);
        $saudara = $reg->saudara;
        $sesi_registrasi_url = $this->sesi_registrasi_url;
        return view('registrasi.step-2', compact('reg', 'saudara', 'sesi_registrasi_url'));
    }

    public function step2_submit(Request $request) {
        $validate = [
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'kewarganegaraan' => 'required',
            'alamat_rumah' => 'required',
            'kode_pos' => 'required|numeric|digits:5',
            'telepon' => 'required|numeric',
            'tinggal_dengan' => 'required',
            'no_hp_calon_siswa' => 'required|numeric',
            'anak_ke' => 'required|integer',
            'jumlah_saudara' => 'required|integer',
            'jarak_tempuh_sekolah' => 'required|integer',
            'waktu_tempuh_sekolah' => 'required|integer',
            'alat_tempuh_sekolah' => 'required',
        ];

        if($request->agama == 'Kristen' || $request->agama == 'Katolik')
            $validate = array_merge($validate, [
                'bergereja_di' => 'required',
                'aktif_pelayan' => 'required'
            ]);

        $request->validate($validate);

        $reg = RegistrasiSiswa::find($this->reg_id);
        $reg->update($request->all());
        
        return redirect(url('registrasi?goto=next&from=2'));
    }

    public function step2_saudara_submit(Request $request) {
        $validator = Validator::make($request->all(), [
            'saudara_nama' => 'required',
            'saudara_umur' => 'required|integer',
            'saudara_pendidikan' => 'required',
            'saudara_status' => 'required',
        ]);
        if ($validator->fails()) 
            return redirect(url()->previous().'#saudara-section')
                ->withInput()
                ->withErrors($validator)
                ->with('saudara-error', 1);
        $id = $request->cookie('registrasi_token');

        $body = array_merge(['registrasi_siswa_id' => $id], $request->all());
        Saudara::create($body);
        return redirect(url()->previous().'#saudara-section')->withInput();
    }

    public function step2_saudara_destroy($id, Request $request) {
        $saudara = Saudara::find($id);
        $saudara->delete();

        return redirect(url()->previous().'#saudara-section')->withInput();
    }

    public function step3(Request $request) {
        $reg = RegistrasiSiswa::find($this->reg_id);
        $sesi_registrasi_url = $this->sesi_registrasi_url;
        return view('registrasi.step-3', compact('reg', 'sesi_registrasi_url'));
    }

    public function step3_submit(Request $request) {
        $reg = RegistrasiSiswa::find($this->reg_id);
        $validate = [];

        if($reg->tingkat == 1 || $reg->tingkat == 2) {

        } else {
            $validate = array_merge($validate, [
                'asal_sekolah' => 'required',
                'alamat_sekolah' => 'required',
                'lama_belajar' => 'required|integer'
            ]);
        }

        $request->validate($validate);
        $reg = RegistrasiSiswa::find($this->reg_id);
        $reg->update($request->all());

        return redirect(url('registrasi?goto=next&from=3'));
    }

    public function step4(Request $request) {
        $reg = RegistrasiSiswa::find($this->reg_id);
        $sesi_registrasi_url = $this->sesi_registrasi_url;
        return view('registrasi.step-4', compact('reg', 'sesi_registrasi_url'));
    }

    public function step4_submit(Request $request) {
        $request->validate([
            'golongan_darah' => 'required',
            'pernah_melakukan_donor' => 'required',
            'tinggi_badan' => 'required',
            'berat_badan' => 'required',
            'berkebutuhan_khusus' => 'required',
        ]);

        $reg = RegistrasiSiswa::find($this->reg_id);
        $reg->update($request->all());

        return redirect(url('registrasi?goto=next&from=4'));
    }

    public function step5(Request $request) {
        $reg = RegistrasiSiswa::find($this->reg_id);
        $kegemaran = $reg->kegemaran_prestasi()->where('jenis_', 'kegemaran')->get();
        $prestasi = $reg->kegemaran_prestasi()->where('jenis_', 'prestasi')->get();
        $sesi_registrasi_url = $this->sesi_registrasi_url;
        return view('registrasi.step-5', compact('kegemaran', 'prestasi', 'sesi_registrasi_url'));
    }

    public function step5_kegemaran_submit(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'jenis' => 'required',
        ]);

        if($validator->fails())
            return redirect(url()->previous())
                    ->withErrors($validator)
                    ->with('error-type', 'kegemaran');
                    
        KegemaranPrestasi::create(array_merge(
            [
                'registrasi_siswa_id' => $this->reg_id,
                'jenis_' => 'kegemaran'
            ], $request->all()));

        return redirect(url()->previous());
    }

    public function step5_kegemaran_destroy($id) {
        $kegemaran_prestasi = KegemaranPrestasi::find($id);
        $kegemaran_prestasi->delete();
        return redirect(url()->previous());
    }

    public function step5_prestasi_submit(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'jenis' => 'required',
        ]);

        if($validator->fails())
            return redirect(url()->previous())
                    ->withErrors($validator)
                    ->with('error-type', 'seni');
                    
        KegemaranPrestasi::create(array_merge(
            [
                'registrasi_siswa_id' => $this->reg_id,
                'jenis_' => 'prestasi'
            ], $request->all()));

        return redirect(url()->previous());
    }

    public function step5_prestasi_destroy($id) {
        $kegemaran_prestasi = KegemaranPrestasi::find($id);
        $kegemaran_prestasi->delete();
        return redirect(url()->previous());
    }

    public function step5_submit(Request $request) {
        return redirect(url('registrasi?goto=next&from=5'));
    }

    public function step6(Request $request) { 
        $reg = RegistrasiSiswa::find($this->reg_id);
        $reg->update($request->all());
        $ayah = $reg->orang_tua()->where('jenis', 'ayah')->first();
        $ibu = $reg->orang_tua()->where('jenis', 'ibu')->first();
        $wali = $reg->wali()->first();
        $sesi_registrasi_url = $this->sesi_registrasi_url;
        return view('registrasi.step-6', compact('reg', 'ayah', 'ibu', 'wali', 'sesi_registrasi_url'));
    }

    public function step6_tinggal_bersama_update(Request $request) {
        $reg = RegistrasiSiswa::find($this->reg_id);
        $reg->update($request->all());

        return redirect(url()->previous());
    }
  
    public function step6_submit(Request $request) {
        $id = $request->cookie('registrasi_token');
        $reg = RegistrasiSiswa::find($id);

        if($reg->tinggal_bersama == 'orang_tua') {
            $request->validate([
                'nama_ayah' => 'required',
                'tempat_lahir_ayah' => 'required',
                'tanggal_lahir_ayah' => 'required',
                'agama_ayah' => 'required',
                'kewarganegaraan_ayah' => 'required',
                'pendidikan_terakhir_ayah' => 'required',
                'pekerjaan_jabatan_ayah' => 'required',
                'alamat_lengkap_ayah' => 'required',
                'no_telepon_ayah' => 'required',
                'keterangan_ayah' => 'required',
                'penghasilan_perbulan_ayah' => 'required',
                'nama_ibu' => 'required',
                'tempat_lahir_ibu' => 'required',
                'tanggal_lahir_ibu' => 'required',
                'agama_ibu' => 'required',
                'kewarganegaraan_ibu' => 'required',
                'pendidikan_terakhir_ibu' => 'required',
                'pekerjaan_jabatan_ibu' => 'required',
                'alamat_lengkap_ibu' => 'required',
                'no_telepon_ibu' => 'required',
                'keterangan_ibu' => 'required',
                'penghasilan_perbulan_ibu' => 'required',
            ]);
        } else {
            $request->validate([
                'nama_wali' => 'required',
                'tempat_lahir_wali' => 'required',
                'tanggal_lahir_wali' => 'required',
                'agama_wali' => 'required',
                'kewarganegaraan_wali' => 'required',
                'pendidikan_terakhir_wali' => 'required',
                'pekerjaan_jabatan_wali' => 'required',
                'alamat_lengkap_wali' => 'required',
                'no_telepon_wali' => 'required',
                'keterangan_wali' => 'required',
                'penghasilan_perbulan_wali' => 'required',
            ]);
        }

        if($reg->tinggal_bersama == 'orang_tua') {
            OrangTua::updateOrCreate([
                    'registrasi_siswa_id' => $this->reg_id,
                    'jenis' => 'ayah',
                ],  
                [
                    'registrasi_siswa_id' => $this->reg_id,
                    'nama' => $request->nama_ayah,
                    'jenis' => 'ayah',
                    'tempat_lahir' => $request->tempat_lahir_ayah,
                    'tanggal_lahir' => $request->tanggal_lahir_ayah,
                    'agama' => $request->agama_ayah,
                    'kewarganegaraan' => $request->kewarganegaraan_ayah,
                    'pendidikan_terakhir' => $request->pendidikan_terakhir_ayah,
                    'pekerjaan_jabatan' => $request->pekerjaan_jabatan_ayah,
                    'alamat_lengkap' => $request->alamat_lengkap_ayah,
                    'no_telepon' => $request->no_telepon_ayah,
                    'keterangan' => $request->keterangan_ayah,
                    'penghasilan_perbulan' => $request->penghasilan_perbulan_ayah,
            ]);

            OrangTua::updateOrCreate([
                    'registrasi_siswa_id' => $this->reg_id,
                    'jenis' => 'ibu',
                ],  
                [
                    'registrasi_siswa_id' => $this->reg_id,
                    'nama' => $request->nama_ibu,
                    'jenis' => 'ibu',
                    'tempat_lahir' => $request->tempat_lahir_ibu,
                    'tanggal_lahir' => $request->tanggal_lahir_ibu,
                    'agama' => $request->agama_ibu,
                    'kewarganegaraan' => $request->kewarganegaraan_ibu,
                    'pendidikan_terakhir' => $request->pendidikan_terakhir_ibu,
                    'pekerjaan_jabatan' => $request->pekerjaan_jabatan_ibu,
                    'alamat_lengkap' => $request->alamat_lengkap_ibu,
                    'no_telepon' => $request->no_telepon_ibu,
                    'keterangan' => $request->keterangan_ibu,
                    'penghasilan_perbulan' => $request->penghasilan_perbulan_ibu,
            ]);
        } else {
            Wali::updateOrCreate([
                    'registrasi_siswa_id' => $this->reg_id
                ],  
                [
                    'registrasi_siswa_id' => $this->reg_id,
                    'nama' => $request->nama_wali,
                    'tempat_lahir' => $request->tempat_lahir_wali,
                    'tanggal_lahir' => $request->tanggal_lahir_wali,
                    'agama' => $request->agama_wali,
                    'kewarganegaraan' => $request->kewarganegaraan_wali,
                    'pendidikan_terakhir' => $request->pendidikan_terakhir_wali,
                    'pekerjaan_jabatan' => $request->pekerjaan_jabatan_wali,
                    'alamat_lengkap' => $request->alamat_lengkap_wali,
                    'no_telepon' => $request->no_telepon_wali,
                    'keterangan' => $request->keterangan_wali,
                    'penghasilan_perbulan' => $request->penghasilan_perbulan_wali,
            ]);
        }

        // Dokumen::where('registrasi_siswa_id', $id)->delete();
        $tingkat = $reg->tingkat;
        $jenis_dokumen = new JenisDokumen;
        if(in_array($tingkat, [1, 2, 3, 4, 5])) {
            $jenis_dokumen = $jenis_dokumen->whereIn('id', [1, 2, 3, 4, 5]);
        } else {
            $jenis_dokumen = $jenis_dokumen->whereIn('id', [1, 2, 3, 4, 7, 8]);
            if($tingkat == 6) {
                $jenis_dokumen = $jenis_dokumen->orWhereIn('id', [9, 10]);
            } else {
                $jenis_dokumen = $jenis_dokumen->orWhereIn('id', [11, 12, 13]);
            }
        }
        if(($reg->agama == 'Kristen' || $reg->agama == 'Katolik') && in_array($tingkat, [1 ,2, 3, 4, 5]))
            $jenis_dokumen = $jenis_dokumen->orWhere('id', 6);

        $jenis_dokumen = $jenis_dokumen->get();

        $dokumen_ids = $jenis_dokumen->map(function($j) {
            return $j->id;
        })->all();

        Dokumen::whereNotIn('jenis_dokumen_id', $dokumen_ids)->where('registrasi_siswa_id', $this->reg_id)->delete();
        
        foreach($jenis_dokumen as $jd) {
            Dokumen::updateOrCreate([
                'registrasi_siswa_id' => $id,
                'jenis_dokumen_id' => $jd->id
            ], [
                'registrasi_siswa_id' => $id,
                'jenis_dokumen_id' => $jd->id
            ]);
        }

        return redirect(url('registrasi?goto=next&from=6'));
    }

    public function step7(Request $request) {
        $id = $request->cookie('registrasi_token');
        $reg = RegistrasiSiswa::find($id);
        $dokumen = $reg->dokumen()->orderBy('id', 'asc')->get();
        $sesi_registrasi_url = $this->sesi_registrasi_url;
        return view('registrasi.step-7', compact('dokumen', 'sesi_registrasi_url'));
    }

    public function step7_update_dokumen($id, Request $request) {
        $validator = Validator::make($request->all(), [
            'dokumen' => 'required|mimes:pdf,jpg,jpeg,png|file|max:2000'
        ]);

        if($validator->fails()) {
            return redirect(url()->previous())->withErrors($validator)->with('error-id', $id);
        }
        $url = Dokumen::find($id)->first()->url;
        if($url) {
            $url_exploded = explode('/', $url);
            $path = implode('/', [ $url_exploded[4], $url_exploded[5] ]);
            Storage::disk('public_uploads')->delete($path);
        }

        $file = $this->fileHandler($request->dokumen);

        Dokumen::where(['id' => $id])->update(['url' => $file['url']]);

        return redirect(url()->previous());
    }

    public function step7_submit(Request $request) {
        $reg = RegistrasiSiswa::find($this->reg_id);
        $dokumen_tak_lengkap = $reg->dokumen()->where(function($query) {
            $query->where('url', null)->whereNotIn('jenis_dokumen_id', [7, 8]);
        })->exists();
        if($dokumen_tak_lengkap) 
            return redirect(url()->previous())->with('error', 'Upload semua dokumen untuk melanjutkan.');
        return redirect(url('registrasi?goto=next&from=7'));
    }

    public function getNamaTingkat($tingkat) {
        switch($tingkat) {
            case 1:
                return 'KB Kecil';
            case 2:
                return 'KB Besar';
            case 3:
                return 'TK A';
            case 4:
                return 'TK B';
            case 5:
                return 'SD';
            case 6:
                return 'SMP';
            case 7:
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
    
    public function step8() {
        $reg = RegistrasiSiswa::find($this->reg_id);
        $sesi_registrasi_url = $this->sesi_registrasi_url;
        return view('registrasi.step-8', compact('reg', 'sesi_registrasi_url'));
    }

    public function step8_submit() {
        return redirect(url('registrasi?goto=next&from=8'));
    }

    public function step9(Request $request) {
        $reg = RegistrasiSiswa::find($this->reg_id);
        $tingkat = $this->getNamaTingkat($reg->tingkat);
        $saudara = $reg->saudara;
        $kegemaran = $reg->kegemaran_prestasi()->where('jenis_', 'kegemaran')->get();
        $prestasi = $reg->kegemaran_prestasi()->where('jenis_', 'prestasi')->get();
        $ayah = $reg->orang_tua()->where('jenis', 'ayah')->first();
        $ibu = $reg->orang_tua()->where('jenis', 'ibu')->first();
        $wali = $reg->wali()->first();
        $sesi_registrasi_url = $this->sesi_registrasi_url;
        $penghasilan_ayah = $ayah ? $this->getPenghasilanPerbulan($ayah->penghasilan_perbulan) : null;
        $penghasilan_ibu = $ibu ? $this->getPenghasilanPerbulan($ibu->penghasilan_perbulan) : null;
        $penghasilan_wali = $wali ? $this->getPenghasilanPerbulan($wali->penghasilan_perbulan) : null;
        $dokumen = $reg->dokumen;
        $sesi_registrasi = json_decode($request->cookie('sesi_registrasi'));
        $sesi_belum_selesai = RegistrasiSiswa::where(function($query) use($sesi_registrasi){
            $query->whereIn('id', $sesi_registrasi)->where('saved', 0);
        })->exists();
        return view('registrasi.step-9', 
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
                'dokumen',
                'sesi_registrasi_url',
                'sesi_belum_selesai'
            )
        );
    }

    public function step9_submit() {
        $reg = RegistrasiSiswa::find($this->reg_id);
        $konfigurasi = \App\Konfigurasi::first();
        $nomor_registrasi = RegistrasiSiswa::where(['tahun_pembelajaran' => $konfigurasi->tahun_pembelajaran, 'saved' => 1])->latest('saved_date')->first() ? RegistrasiSiswa::where(['tahun_pembelajaran' => $konfigurasi->tahun_pembelajaran, 'saved' => 1])->latest('saved_date')->first()->nomor_registrasi : null;
        if(!$nomor_registrasi) {
            $reg->nomor_registrasi = 'OL-001';
        } else {
            $new_no = explode('-', $nomor_registrasi);
            $int_no = (int)$new_no[1]+1;
            if($int_no < 10)
                $new_no = '0'.'0'.(string)$int_no;
            elseif($int_no < 100)
                $new_no = '0'.(string)$int_no;
            else {
                $new_no = (string)$int_no;
            }
            $new_no = 'OL-'.$new_no;
            $reg->nomor_registrasi = $new_no;
        }
        $reg->saved = 1;
        $reg->saved_date = \Carbon\Carbon::now();

        foreach($reg->dokumen as $d) {
            '/dokumen/nama.jpg';
            $explodes = explode('/', $d->url);
            $length = count($explodes);
            $slug = Str::slug(strtolower($d->jenis_dokumen->nama), '-');
            $from = $explodes[$length-2].'/'.$explodes[$length-1];
            $to = 'dokumen-tersimpan/'.$reg->tahun_pembelajaran.'/'.$reg->nomor_registrasi.'/'.$slug.'-'.$explodes[$length-1];
            Storage::disk('public_uploads')->move($from, $to);
            $d = Dokumen::find($d->id);
            $d->url = url('/uploads/'.$to);
            $d->save();
        }

        $reg->save();

        return redirect(url()->previous());
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
