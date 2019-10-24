@extends('master')

@section('title', 'Registrasi 6/7')

@section('css')
    <style>
        body {
            background: #1e88e5;   
        }

        .register-box {
            box-shadow: 0px 0px 8px 2px rgba(9,101,181,1);
        }

        h5 {
            padding: 10px 20px;
            background: #fff31c;
        }

        .title {
            background: #ff8921;
            color: white;
            border-radius: 15px;
            display: inline-block;
            padding: 5px 20px;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <div style='height: 60px; background: #0067c2'></div>
    <div class="container p-0 bg-white register-box mt-3">
        <h5 class="m-0"><img height='40' src="https://img.icons8.com/dotty/80/000000/note.png"> Registrasi - Orang Tua / Wali Siswa (6/7)</h5>
        <form action="{{ url('registrasi/6') }}" class="p-3" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Tinggal Bersama</label>
                <br>
                <input type="radio" name="tinggal_bersama" value="orang_tua" {{ $reg->tinggal_bersama == 'orang_tua' ? 'checked' : '' }}> Orang Tua <input type="radio" name="tinggal_bersama" value="wali" {{ $reg->tinggal_bersama == 'wali' ? 'checked' : '' }} class="ml-2"> Wali
            </div>
            <hr>
            @if($reg->tinggal_bersama == 'orang_tua')
                <div class="title my-3">Ayah</div>
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input name="nama_ayah" value="{{ old('nama_ayah') ? old('nama_ayah') : ($ayah ? $ayah->nama : '') }}" type="text" class="form-control">
                    @if($errors->has('nama_ayah'))
                        <p class="text-danger">{{ $errors->first('nama_ayah') }}</p>
                    @endif
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Tempat Lahir</label>
                        <input name="tempat_lahir_ayah" value="{{ old('tempat_lahir_ayah') ? old('tempat_lahir_ayah') : ($ayah ? $ayah->tempat_lahir : '') }}" type="text" class="form-control">
                        @if($errors->has('tempat_lahir_ayah'))
                            <p class="text-danger">{{ $errors->first('tempat_lahir_ayah') }}</p>
                        @endif
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Tanggal Lahir</label>
                        <input name="tanggal_lahir_ayah" value="{{ old('tanggal_lahir_ayah') ? old('tanggal_lahir_ayah') : ($ayah ? $ayah->tanggal_lahir : '') }}" type="date" class="form-control">
                        @if($errors->has('tanggal_lahir_ayah'))
                            <p class="text-danger">{{ $errors->first('tanggal_lahir_ayah') }}</p>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label>Agama</label>
                    <select name="agama_ayah" class="form-control" id="">
                        <option {{ (old('agama_ayah') ? old('agama_ayah') : ($ayah ? $ayah->agama : '')) == 'Kristen' ? 'selected' : '' }} value="Kristen">Kristen</option>
                        <option {{ (old('agama_ayah') ? old('agama_ayah') : ($ayah ? $ayah->agama : '')) == 'Katolik' ? 'selected' : '' }} value="Katolik">Katolik</option>
                        <option {{ (old('agama_ayah') ? old('agama_ayah') : ($ayah ? $ayah->agama : '')) == 'Islam' ? 'selected' : '' }} value="Islam">Islam</option>
                    </select>
                    @if($errors->has('agama_ayah'))
                        <p class="text-danger">{{ $errors->first('agama_ayah') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Kewarganegaraan</label>
                    <input name="kewarganegaraan_ayah" value="{{ old('kewarganegaraan_ayah') ? old('kewarganegaraan_ayah') : ($ayah ? $ayah->kewarganegaraan : '') }}" type="text" class="form-control">
                    @if($errors->has('kewarganegaraan_ayah'))
                        <p class="text-danger">{{ $errors->first('kewarganegaraan_ayah') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Pendidikan Terakhir</label>
                    <input value="{{ old('pendidikan_terakhir_ayah') ? old('pendidikan_terakhir_ayah') : ($ayah ? $ayah->pendidikan_terakhir : '') }}" name="pendidikan_terakhir_ayah" type="text" class="form-control">
                    @if($errors->has('pendidikan_terakhir_ayah'))
                        <p class="text-danger">{{ $errors->first('pendidikan_terakhir_ayah') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Pekerjaaan / Jabatan</label>
                    <input name="pekerjaan_jabatan_ayah" value="{{ old('pekerjaan_jabatan_ayah') ? old('pekerjaan_jabatan_ayah') : ($ayah ? $ayah->pekerjaan_jabatan : '') }}" type="text" class="form-control">
                    @if($errors->has('pekerjaan_jabatan_ayah'))
                        <p class="text-danger">{{ $errors->first('pekerjaan_jabatan_ayah') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <textarea name="alamat_lengkap_ayah" class="form-control">{{ old('alamat_lengkap_ayah') ? old('alamat_lengkap_ayah') : ($ayah ? $ayah->alamat_lengkap : '') }}</textarea>
                    @if($errors->has('alamat_lengkap_ayah'))
                        <p class="text-danger">{{ $errors->first('alamat_lengkap_ayah') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>No telepon / HP</label>
                    <input name="no_telepon_ayah" value="{{ old('no_telepon_ayah') ? old('no_telepon_ayah') : ($ayah ? $ayah->no_telepon : '') }}" type="text" class="form-control">
                    @if($errors->has('no_telepon_ayah'))
                        <p class="text-danger">{{ $errors->first('no_telepon_ayah') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <br>
                    <input name="keterangan_ayah" value="Masih Hidup" {{ (old('keterangan_ayah') ? old('keterangan_ayah') : ($ayah ? $ayah->keterangan : '')) == 'Masih Hidup' ? 'checked' : '' }} type="radio"> Masih Hidup <input type="radio" {{ (old('keterangan_ayah') ? old('keterangan_ayah') : ($ayah ? $ayah->keterangan : '')) == 'Sudah Wafat' ? 'checked' : '' }} value='Sudah Wafat' name="keterangan_ayah" class="ml-2"> Sudah Wafat
                    @if($errors->has('keterangan_ayah'))
                        <p class="text-danger">{{ $errors->first('keterangan_ayah') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Penghasilan perbulan</label>
                    <br>
                    <input {{ (old('penghasilan_perbulan_ayah') ? old('penghasilan_perbulan_ayah') : ($ayah ? $ayah->penghasilan_perbulan : '')) == 1 ? 'checked' : '' }} type="radio" name="penghasilan_perbulan_ayah" value="1"> < 5.000.000 <br>
                    <input {{ (old('penghasilan_perbulan_ayah') ? old('penghasilan_perbulan_ayah') : ($ayah ? $ayah->penghasilan_perbulan : '')) == 2 ? 'checked' : '' }} type="radio" name="penghasilan_perbulan_ayah" value="2"> 5.000.000 - 10.000.0000 <br>
                    <input {{ (old('penghasilan_perbulan_ayah') ? old('penghasilan_perbulan_ayah') : ($ayah ? $ayah->penghasilan_perbulan : '')) == 3 ? 'checked' : '' }} type="radio" name="penghasilan_perbulan_ayah" value="3"> 10.000.000 - 15.000.0000 <br>
                    <input {{ (old('penghasilan_perbulan_ayah') ? old('penghasilan_perbulan_ayah') : ($ayah ? $ayah->penghasilan_perbulan : '')) == 4 ? 'checked' : '' }} type="radio" name="penghasilan_perbulan_ayah" value="4"> > 15.000.000 <br>
                    @if($errors->has('penghasilan_perbulan_ayah'))
                        <p class="text-danger">{{ $errors->first('penghasilan_perbulan_ayah') }}</p>
                    @endif
                </div>
                <hr>
                <div class="title my-3">Ibu</div>
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input name="nama_ibu" value="{{ old('nama_ibu') ? old('nama_ibu') : ($ibu ? $ibu->nama : '') }}" type="text" class="form-control">
                    @if($errors->has('nama_ibu'))
                        <p class="text-danger">{{ $errors->first('nama_ibu') }}</p>
                    @endif
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Tempat Lahir</label>
                        <input name="tempat_lahir_ibu" value="{{ old('tempat_lahir_ibu') ? old('tempat_lahir_ibu') : ($ibu ? $ibu->tempat_lahir : '') }}" type="text" class="form-control">
                        @if($errors->has('tempat_lahir_ibu'))
                            <p class="text-danger">{{ $errors->first('tempat_lahir_ibu') }}</p>
                        @endif
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Tanggal Lahir</label>
                        <input name="tanggal_lahir_ibu" value="{{ old('tanggal_lahir_ibu') ? old('tanggal_lahir_ibu') : ($ibu ? $ibu->tanggal_lahir : '') }}" type="date" class="form-control">
                        @if($errors->has('tanggal_lahir_ibu'))
                            <p class="text-danger">{{ $errors->first('tanggal_lahir_ibu') }}</p>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label>Agama</label>
                    <select name="agama_ibu" class="form-control" id="">
                        <option {{ (old('agama_ibu') ? old('agama_ibu') : ($ibu ? $ibu->agama : '')) == 'Kristen' ? 'selected' : '' }} value="Kristen">Kristen</option>
                        <option {{ (old('agama_ibu') ? old('agama_ibu') : ($ibu ? $ibu->agama : '')) == 'Katolik' ? 'selected' : '' }} value="Katolik">Katolik</option>
                        <option {{ (old('agama_ibu') ? old('agama_ibu') : ($ibu ? $ibu->agama : '')) == 'Islam' ? 'selected' : '' }} value="Islam">Islam</option>
                    </select>
                    @if($errors->has('agama_ibu'))
                        <p class="text-danger">{{ $errors->first('agama_ibu') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Kewarganegaraan</label>
                    <input name="kewarganegaraan_ibu" value="{{ old('kewarganegaraan_ibu') ? old('kewarganegaraan_ibu') : ($ibu ? $ibu->kewarganegaraan : '') }}" type="text" class="form-control">
                    @if($errors->has('kewarganegaraan_ibu'))
                        <p class="text-danger">{{ $errors->first('kewarganegaraan_ibu') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Pendidikan Terakhir</label>
                    <input name="pendidikan_terakhir_ibu" value="{{ old('pendidikan_terakhir_ibu') ? old('pendidikan_terakhir_ibu') : ($ibu ? $ibu->pendidikan_terakhir : '') }}" type="text" class="form-control">
                    @if($errors->has('pendidikan_terakhir_ibu'))
                        <p class="text-danger">{{ $errors->first('pendidikan_terakhir_ibu') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Pekerjaaan / Jabatan</label>
                    <input name="pekerjaan_jabatan_ibu" value="{{ old('pekerjaan_jabatan_ibu') ? old('pekerjaan_jabatan_ibu') : ($ibu ? $ibu->pekerjaan_jabatan : '') }}" type="text" class="form-control">
                    @if($errors->has('pekerjaan_jabatan_ibu'))
                        <p class="text-danger">{{ $errors->first('pekerjaan_jabatan_ibu') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <textarea name="alamat_lengkap_ibu" class="form-control">{{ old('alamat_lengkap_ibu') ? old('alamat_lengkap_ibu') : ($ibu ? $ibu->alamat_lengkap : '') }}</textarea>
                    @if($errors->has('alamat_lengkap_ibu'))
                        <p class="text-danger">{{ $errors->first('alamat_lengkap_ibu') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>No telepon / HP</label>
                    <input name="no_telepon_ibu" value="{{ old('no_telepon_ibu') ? old('no_telepon_ibu') : ($ibu ? $ibu->no_telepon : '') }}" type="text" class="form-control">
                    @if($errors->has('no_telepon_ibu'))
                        <p class="text-danger">{{ $errors->first('no_telepon_ibu') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <br>
                    <input name="keterangan_ibu" value="Masih Hidup" type="radio" {{ (old('keterangan_ibu') ? old('keterangan_ibu') : ($ibu ? $ibu->keterangan : '')) == 'Masih Hidup' ? 'checked' : '' }}> Masih Hidup <input type="radio" value="Sudah Wafat" class="ml-2" {{ (old('keterangan_ibu') ? old('keterangan_ibu') : ($ibu ? $ibu->keterangan : '')) == 'Sudah Wafat' ? 'checked' : '' }}> Sudah Wafat
                    @if($errors->has('keterangan_ibu'))
                        <p class="text-danger">{{ $errors->first('keterangan_ibu') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Penghasilan perbulan</label>
                    <br>
                    <input {{ (old('penghasilan_perbulan_ibu') ? old('penghasilan_perbulan_ibu') : ($ibu ? $ibu->penghasilan_perbulan : '')) == 1 ? 'checked' : '' }} name="penghasilan_perbulan_ibu" type="radio" value="1"> < 5.000.000 <br>
                    <input {{ (old('penghasilan_perbulan_ibu') ? old('penghasilan_perbulan_ibu') : ($ibu ? $ibu->penghasilan_perbulan : '')) == 2 ? 'checked' : '' }} name="penghasilan_perbulan_ibu" type="radio" value="2"> 5.000.000 - 10.000.0000 <br>
                    <input {{ (old('penghasilan_perbulan_ibu') ? old('penghasilan_perbulan_ibu') : ($ibu ? $ibu->penghasilan_perbulan : '')) == 3 ? 'checked' : '' }} name="penghasilan_perbulan_ibu" type="radio" value="3"> 10.000.000 - 15.000.0000 <br>
                    <input {{ (old('penghasilan_perbulan_ibu') ? old('penghasilan_perbulan_ibu') : ($ibu ? $ibu->penghasilan_perbulan : '')) == 4 ? 'checked' : '' }} name="penghasilan_perbulan_ibu" type="radio" value="4"> > 15.000.000 <br>
                    @if($errors->has('penghasilan_perbulan_ibu'))
                        <p class="text-danger">{{ $errors->first('penghasilan_perbulan_ibu') }}</p>
                    @endif
                </div>
                <hr>
            @endif
            @if($reg->tinggal_bersama == 'wali')
                <div class="title my-3">Wali</div>
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input name="nama_wali" value="{{ old('nama_wali') ? old('nama_wali') : ($wali ? $wali->nama : '') }}" type="text" class="form-control">
                    @if($errors->has('nama_wali'))
                        <p class="text-danger">{{ $errors->first('nama_wali') }}</p>
                    @endif
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Tempat Lahir</label>
                        <input value="{{ old('tempat_lahir_wali') ? old('tempat_lahir_wali') : ($wali ? $wali->tempat_lahir : '') }}" name="tempat_lahir_wali" type="text" class="form-control">
                        @if($errors->has('tempat_lahir_wali'))
                            <p class="text-danger">{{ $errors->first('tempat_lahir_wali') }}</p>
                        @endif
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Tanggal Lahir</label>
                        <input value="{{ old('tanggal_lahir_wali') ? old('tanggal_lahir_wali') : ($wali ? $wali->tanggal_lahir : '') }}" name="tanggal_lahir_wali" type="date" class="form-control">
                        @if($errors->has('tanggal_lahir_wali'))
                            <p class="text-danger">{{ $errors->first('tanggal_lahir_wali') }}</p>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label>Agama</label>
                    <select name="agama_wali" class="form-control" id="">
                        <option {{ (old('agama_wali') ? old('agama_wali') : ($wali ? $wali->agama : '')) == 'Kristen' ? 'selected' : '' }} value="Kristen">Kristen</option>
                        <option {{ (old('agama_wali') ? old('agama_wali') : ($wali ? $wali->agama : '')) == 'Katolik' ? 'selected' : '' }} value="Katolik">Katolik</option>
                        <option {{ (old('agama_wali') ? old('agama_wali') : ($wali ? $wali->agama : '')) == 'Islam' ? 'selected' : '' }} value="Islam">Islam</option>
                    </select>
                    @if($errors->has('agama_wali'))
                        <p class="text-danger">{{ $errors->first('agama_wali') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Kewarganegaraan</label>
                    <input name="kewarganegaraan_wali" value="{{ old('kewarganegaraan_wali') ? old('kewarganegaraan_wali') : ($wali ? $wali->kewarganegaraan : '') }}" type="text" class="form-control">
                    @if($errors->has('kewarganegaraan_wali'))
                        <p class="text-danger">{{ $errors->first('kewarganegaraan_wali') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Pendidikan Terakhir</label>
                    <input value="{{ old('pendidikan_terakhir_wali') ? old('pendidikan_terakhir_wali') : ($wali ? $wali->pendidikan_terakhir : '') }}" name="pendidikan_terakhir_wali" type="text" class="form-control">
                    @if($errors->has('pendidikan_terakhir_wali'))
                        <p class="text-danger">{{ $errors->first('pendidikan_terakhir_wali') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Pekerjaaan / Jabatan</label>
                    <input value="{{ old('pekerjaan_jabatan_wali') ? old('pekerjaan_jabatan_wali') : ($wali ? $wali->pekerjaan_jabatan : '') }}" name="pekerjaan_jabatan_wali" type="text" class="form-control">
                    @if($errors->has('pekerjaan_jabatan_wali'))
                        <p class="text-danger">{{ $errors->first('pekerjaan_jabatan_wali') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <textarea name="alamat_lengkap_wali" class="form-control">{{ old('alamat_lengkap_wali') ? old('alamat_lengkap_wali') : ($wali ? $wali->alamat_lengkap : '') }}</textarea>
                    @if($errors->has('alamat_lengkap_wali'))
                        <p class="text-danger">{{ $errors->first('alamat_lengkap_wali') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>No telepon / HP</label>
                    <input name="no_telepon_wali" value="{{ old('no_telepon_wali') ? old('no_telepon_wali') : ($wali ? $wali->no_telepon : '') }}" type="text" class="form-control">
                    @if($errors->has('no_telepon_wali'))
                        <p class="text-danger">{{ $errors->first('no_telepon_wali') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <br>
                    <input name="keterangan_wali" {{ (old('keterangan_wali') ? old('keterangan_wali') : ($wali ? $wali->keterangan : '')) == 'Masih Hidup' ? 'checked' : '' }} value="Masih Hidup" type="radio"> Masih Hidup <input type="radio" {{ (old('keterangan_wali') ? old('keterangan_wali') : ($wali ? $wali->keterangan : '')) == 'Sudah Wafat' ? 'checked' : '' }} value='Sudah Wafat' name="keterangan_wali" class="ml-2"> Sudah Wafat
                    @if($errors->has('keterangan_wali'))
                        <p class="text-danger">{{ $errors->first('keterangan_wali') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Penghasilan perbulan</label>
                    <br>
                    <input {{ (old('penghasilan_perbulan_wali') ? old('penghasilan_perbulan_wali') : ($wali ? $wali->penghasilan_perbulan : '')) == '1' ? 'checked' : '' }} value='1' type="radio" name="penghasilan_perbulan_wali"> < 5.000.000 <br>
                    <input {{ (old('penghasilan_perbulan_wali') ? old('penghasilan_perbulan_wali') : ($wali ? $wali->penghasilan_perbulan : '')) == '2' ? 'checked' : '' }} value='2' type="radio" name="penghasilan_perbulan_wali"> 5.000.000 - 10.000.0000 <br>
                    <input {{ (old('penghasilan_perbulan_wali') ? old('penghasilan_perbulan_wali') : ($wali ? $wali->penghasilan_perbulan : '')) == '3' ? 'checked' : '' }} value='3' type="radio" name="penghasilan_perbulan_wali"> 10.000.000 - 15.000.0000 <br>
                    <input {{ (old('penghasilan_perbulan_wali') ? old('penghasilan_perbulan_wali') : ($wali ? $wali->penghasilan_perbulan : '')) == '4' ? 'checked' : '' }} value='4' type="radio" name="penghasilan_perbulan_wali"> > 15.000.000 <br>
                    @if($errors->has('penghasilan_perbulan_wali'))
                        <p class="text-danger">{{ $errors->first('penghasilan_perbulan_wali') }}</p>
                    @endif
                </div>
            @endif
            <div class="mt-5 d-flex justify-content-end">
                <a href="{{ url('registrasi?goto=prev') }}" class="btn btn-info">Kembali</a>
                <input type="submit" class="ml-2 btn btn-warning" value="Simpan & Lanjutkan">
            </div>
            @csrf
            @method('POST')
        </form>
        <form style="display: none" id="update_bersama_dengan_form" action="{{ url('/registrasi/6/tinggal_bersama') }}" method="POST">
            <input type="text" id="tinggal_bersama" name="tinggal_bersama">
            @csrf
            @method('PUT')
        </form>
    </div>
@endsection

@section('js')
    <script>
        $("input[name='tinggal_bersama']").change(function() {
            var tinggal_bersama = $("input[name='tinggal_bersama']:checked").val();
            $('#tinggal_bersama').val(tinggal_bersama);
            // console.log(tinggal_bersama);
            $('#update_bersama_dengan_form').submit();
        });
    </script>
@endsection