<?php

namespace App\Http\Controllers;

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

class RegistrasiController extends Controller
{
    public function __construct (Request $request) {
        if($request->cookie('registrasi_token'))
            $this->reg_id = Crypt::decryptString($request->cookie('registrasi_token'));
    }


    public function init(Request $request) {
        $reg_token = $request->cookie('registrasi_token');
        if(!$reg_token) {
            $reg = RegistrasiSiswa::create([
                'last_step' => '1'
            ]);
            return redirect('registrasi/1')->withCookie(cookie()->forever('registrasi_token', $reg->id));
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
        return view('registrasi.step-1', compact('reg'));
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
        return view('registrasi.step-2', compact('reg', 'saudara'));
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
            'kode_pos' => 'required',
            'telepon' => 'required',
            'tinggal_dengan' => 'required',
            'no_hp_calon_siswa' => 'required',
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
        
        return redirect(url('registrasi?goto=next'));
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

        return view('registrasi.step-3', compact('reg'));
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

        return redirect(url('registrasi?goto=next'));
    }

    public function step4(Request $request) {
        $reg = RegistrasiSiswa::find($this->reg_id);

        return view('registrasi.step-4', compact('reg'));
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

        return redirect(url('registrasi?goto=next'));
    }

    public function step5(Request $request) {
        $reg = RegistrasiSiswa::find($this->reg_id);
        $kegemaran = $reg->kegemaran_prestasi()->where('jenis_', 'kegemaran')->get();
        $prestasi = $reg->kegemaran_prestasi()->where('jenis_', 'prestasi')->get();
        return view('registrasi.step-5', compact('kegemaran', 'prestasi'));
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
        return redirect(url('registrasi?goto=next'));
    }

    public function step6(Request $request) { 
        $reg = RegistrasiSiswa::find($this->reg_id);
        $reg->update($request->all());
        $ayah = $reg->orang_tua()->where('jenis', 'ayah')->first();
        $ibu = $reg->orang_tua()->where('jenis', 'ibu')->first();
        $wali = $reg->wali()->first();

        return view('registrasi.step-6', compact('reg', 'ayah', 'ibu', 'wali'));
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
        if(in_array($tingkat, [1,2,3])) {
            $jenis_dokumen = $jenis_dokumen->whereIn('id', [1, 2, 3, 4, 5]);
        } else {
            $jenis_dokumen = $jenis_dokumen->whereIn('id', [1, 2, 3, 4, 7, 8]);
            if(in_array($tingkat, [7, 8, 9])) {
                $jenis_dokumen = $jenis_dokumen->orWhereIn('id', [9, 10]);
            } else {
                $jenis_dokumen = $jenis_dokumen->orWhereIn('id', [11, 12, 13]);
            }
        }
        if(($reg->agama == 'Kristen' || $reg->agama == 'Katolik') && in_array($tingkat, [-3, -2, -1, 0, 1, 2, 3, 4, 5, 6]))
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

        return redirect(url('registrasi?goto=next'));
    }

    public function step7(Request $request) {
        $id = $request->cookie('registrasi_token');
        $reg = RegistrasiSiswa::find($id);
        $dokumen = $reg->dokumen()->orderBy('id', 'asc')->get();
        return view('registrasi.step-7', compact('dokumen'));
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
        $dokumen_tak_lengkap = $reg->dokumen()->where('url', null)->exists();
        if($dokumen_tak_lengkap) 
            return redirect(url()->previous())->with('error', 'Upload semua dokumen untuk melanjutkan.');
        return redirect(url('registrasi?goto=next'));
    }

    public function getNamaTingkat($tingkat) {
        switch($tingkat) {
            case -3: 
                return 'KB Kecil';
            case -2:
                return 'KB Besar';
            case -1:
                return 'TK A';
            case 0:
                return 'TK B';
            case 1:
                return 'SD 1';
            case 2:
                return 'SD 2';
            case 3:
                return 'SD 3';
            case 4:
                return 'SD 4';
            case 5:
                return 'SD 5';
            case 6:
                return 'SD 6';
            case 7:
                return 'SMP 1';
            case 8:
                return 'SMP 2';
            case 9:
                return 'SMP 3';
            case 10:
                return 'SMA 1';
            case 11:
                return 'SMA 2';
            case 12:
                return 'SMA 3';
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
        return view('registrasi.step-8', 
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

    public function step8_submit() {
        $reg = RegistrasiSiswa::find($this->reg_id);
        $reg->saved = 1;
        $reg->saved_date = \Carbon\Carbon::now();
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
