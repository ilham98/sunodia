@extends('master')

@section('title', 'Registrasi 2/7')

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
    </style>
@endsection

@section('content')
    <div style='height: 60px; background: #0067c2'></div>
    <div class="container p-0 bg-white register-box mt-3">
        <h5 class="m-0"><img height='40' src="https://img.icons8.com/dotty/80/000000/note.png"> Registrasi - Data Calon Siswa (2/7)</h5>
        <form action="{{ url('registrasi/2') }}" class="p-3" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-sm-12">
                    <label>Nama</label>
                    <input name="nama" type="text" class="form-control" value="{{ old('nama') ? old('nama') : $reg->nama }}">
                    @if($errors->has('nama'))
                        <p class="text-danger">{{ $errors->first('nama') }}</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label>Tempat Lahir</label>
                    <input name="tempat_lahir" type="text" class="form-control" value="{{ old('tempat_lahir') ? old('tempat_lahir') : $reg->tempat_lahir }}">
                    @if($errors->has('tempat_lahir'))
                        <p class="text-danger">{{ $errors->first('tempat_lahir') }}</p>
                    @endif
                </div>
                <div class="form-group col-sm-6">
                    <label>Tanggal Lahir</label>
                    <input name="tanggal_lahir" type="date" class="form-control" value="{{ old('tanggal_lahir') ? old('tanggal_lahir') : $reg->tanggal_lahir }}">
                    @if($errors->has('tanggal_lahir'))
                        <p class="text-danger">{{ $errors->first('tanggal_lahir') }}</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label>Agama</label>
                    <select name="agama" id="" class="form-control">
                        <option value="">Pilih Agama</option>
                        <option value="Kristen" {{ (old('agama') ? old('agama') : $reg->agama) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                        <option value="Katolik" {{ (old('agama') ? old('agama') : $reg->agama) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                        <option value="Islam" {{ (old('agama') ? old('agama') : $reg->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                    </select>
                    @if($errors->has('agama'))
                        <p class="text-danger">{{ $errors->first('agama') }}</p>
                    @endif
                </div>
                <div class="form-group col-sm-6">
                    <label>Kewarganegaraan</label>
                    <input type="text" value="{{ old('kewarganegaraan') ? old('kewarganegaraan') : $reg->kewarganegaraan }}" name="kewarganegaraan" class="form-control">
                    @if($errors->has('kewarganegaraan'))
                        <p class="text-danger">{{ $errors->first('kewarganegaraan') }}</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12">
                    <label>Alamat Rumah</label>
                    <textarea name="alamat_rumah" type="text" class="form-control">{{ old('alamat_rumah') ? old('alamat_rumah') : $reg->alamat_rumah }}</textarea>
                    @if($errors->has('alamat_rumah'))
                        <p class="text-danger">{{ $errors->first('alamat_rumah') }}</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label>Kode Pos</label>
                    <input name="kode_pos" type="text" class="form-control" value="{{ old('kode_pos') ? old('kode_pos') : $reg->kode_pos }}">
                    @if($errors->has('kode_pos'))
                        <p class="text-danger">{{ $errors->first('kode_pos') }}</p>
                    @endif
                </div>
                <div class="form-group col-sm-6">
                    <label>Telepon</label>
                    <input name="telepon" type="text" class="form-control" value="{{ old('telepon') ? old('telepon') : $reg->telepon }}">
                    @if($errors->has('telepon'))
                        <p class="text-danger">{{ $errors->first('telepon') }}</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12">
                    <label>Tinggal Dengan</label>
                    <br>
                    <input type="radio" value="Orang Tua" {{ (old('tinggal_dengan') ? old('tinggal_dengan') : $reg->tinggal_dengan)  == 'Orang Tua' ? 'checked' : '' }} name="tinggal_dengan" class="ml-2"> Orang Tua
                    <input type="radio" value="Wali"{{ (old('tinggal_dengan') ? old('tinggal_dengan') : $reg->tinggal_dengan) == 'Wali' ? 'checked' : '' }} name="tinggal_dengan" class="ml-2"> Wali
                    <input type="radio" value="Asrama"{{ (old('tinggal_dengan') ? old('tinggal_dengan') : $reg->tinggal_dengan) == 'Asrama' ? 'checked' : '' }} name="tinggal_dengan" class="ml-2"> Asrama
                    <input type="radio" value="Kost"{{ (old('tinggal_dengan') ? old('tinggal_dengan') : $reg->tinggal_dengan) == 'Kost' ? 'checked' : '' }} name="tinggal_dengan" class="ml-2"> Kost
                    @if($errors->has('tinggal_dengan'))
                        <p class="text-danger">{{ $errors->first('tinggal_dengan') }}</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label>No Hp Calon Siswa</label>
                    <input type="text" name="no_hp_calon_siswa" class="form-control" value="{{ old('no_hp_calon_siswa') ? old('no_hp_calon_siswa') : $reg->no_hp_calon_siswa }}">
                    @if($errors->has('no_hp_calon_siswa'))
                        <p class="text-danger">{{ $errors->first('no_hp_calon_siswa') }}</p>
                    @endif
                </div>
                <div class="form-group col-sm-6">
                    <label>Alamat E-mail Calon Siswa</label>
                    <input name="email_calon_siswa" type="text" class="form-control" value="{{ old('email_calon_siswa') ? old('email_calon_siswa') : $reg->email_calon_siswa }}">
                    @if($errors->has('email_calon_siswa'))
                        <p class="text-danger">{{ $errors->first('email_calon_siswa') }}</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label>Anak Keberapa dalam keluarga</label>
                    <input name="anak_ke" type="text" class="form-control" value="{{ old('anak_ke') ? old('anak_ke') : $reg->anak_ke }}">
                    @if($errors->has('anak_ke'))
                        <p class="text-danger">{{ $errors->first('anak_ke') }}</p>
                    @endif
                </div>
                <div class="form-group col-sm-6">
                    <label>Jumlah Saudara Kandung / Angkat</label>
                    <input name="jumlah_saudara" type="text" class="form-control" value="{{ old('jumlah_saudara') ? old('jumlah_saudara') : $reg->jumlah_saudara }}">
                    @if($errors->has('jumlah_saudara'))
                        <p class="text-danger">{{ $errors->first('jumlah_saudara') }}</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12" id="saudara-section">
                    <label>Saudara Kandung / angkat yang masih sekolah</label>
                    <table class="table table-responsive w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th style="min-width: 200px">Nama</th>
                                <th>Umur</th>
                                <th style="min-width: 200px">Pendidikan</th>
                                <th style="min-width: 100px">Status</th>
                                <th>Option</th>
                            </tr>
                            @foreach($saudara as $i => $s)
                                <tr>
                                    <td>{{ $i+1 }}</td>
                                    <td>{{ $s->saudara_nama }}</td>
                                    <td>{{ $s->saudara_umur }}</td>
                                    <td>{{ $s->saudara_pendidikan }}</td>
                                    <td>{{ $s->saudara_status }}</td>   
                                    <td><a href="#" class="text-danger saudara-delete-btn" data-id='{{ $s->id }}'>Hapus</a></td>
                                </tr>
                            @endforeach  
                            <tr>
                                <td>{{ $saudara->count() + 1 }}</td>
                                <td><input type="text" id="temp_saudara_nama" name="temp_saudara_nama" class="form-control" value="{{ old('saudara_nama') }}"></td>
                                <td><input type="text" id="temp_saudara_umur" name="temp_saudara_umur" class="form-control" value="{{ old('saudara_umur') }}"></td>
                                <td><input type="text" id="temp_saudara_pendidikan" name="temp_saudara_pendidikan" class="form-control" value="{{ old('saudara_pendidikan') }}"></td>
                                <td>
                                    <input type="radio" name="temp_saudara_status" value="Kakak" {{ old('saudara_status') == 'Kakak' ? 'checked' : '' }}> Kakak
                                    <br>
                                    <input type="radio" name="temp_saudara_status" value="Adik" {{ old('saudara_status') == 'Adik' ? 'checked' : '' }}> Adik
                                </td>
                                <td><input type="button" class="btn btn-success" id="saudara-tambah-btn" value="Tambah"></td>
                            </tr>                           
                        </thead>
                    </table>
                    @if(session('saudara-error'))
                        @foreach($errors->all() as $a)
                            <p class="text-danger">{{ $a }}</p>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="row col-sm-6">
                <div class="form-group">
                    <label>Jarak Tempuh Ke sekolah</label>
                    <div class="input-group mb-3">
                        <input name="jarak_tempuh_sekolah" type="text" value="{{ old('jarak_tempuh_sekolah') ? old('jarak_tempuh_sekolah') : $reg->jarak_tempuh_sekolah }}" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">KM</span>
                        </div>
                    </div>
                    @if($errors->has('jarak_tempuh_sekolah'))
                        <p class="text-danger">{{ $errors->first('jarak_tempuh_sekolah') }}</p>
                    @endif
                </div>
            </div>
            <div class="row col-sm-6">
                <div class="form-group">
                    <label>Waktu tempuh ke Sekolah</label>
                    <div class="input-group mb-3">
                        <input name="waktu_tempuh_sekolah" value="{{ old('waktu_tempuh_sekolah') ? old('waktu_tempuh_sekolah') : $reg->waktu_tempuh_sekolah }}" type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">Menit</span>
                        </div>
                    </div>
                    @if($errors->has('waktu_tempuh_sekolah'))
                        <p class="text-danger">{{ $errors->first('waktu_tempuh_sekolah') }}</p>
                    @endif
                </div>
            </div>
            <div class="row col-sm-12" >
                <div class="form-group w-100">
                    <label>Alat tempuh ke Sekolah</label><br>
                    <div class="row ml-3">
                        <div class="col-sm-2 p-0">
                            <input type="radio" name="alat_tempuh_sekolah" {{ (old('alat_tempuh_sekolah') ? old('alat_tempuh_sekolah') : $reg->alat_tempuh_sekolah) == 'Sepeda' ? 'checked' : '' }} value="Sepeda"> Sepeda
                        </div>
                        <div class="col-sm-2 p-0">
                            <input type="radio" name="alat_tempuh_sekolah" {{ (old('alat_tempuh_sekolah') ? old('alat_tempuh_sekolah') : $reg->alat_tempuh_sekolah) == 'Sepeda Motor' ? 'checked' : '' }} value="Sepeda Motor"> Sepeda Motor
                        </div>
                        <div class="col-sm-3 p-0">
                            <input type="radio" name="alat_tempuh_sekolah" {{ (old('alat_tempuh_sekolah') ? old('alat_tempuh_sekolah') : $reg->alat_tempuh_sekolah) == 'Kendaraan Roda Empat' ? 'checked' : '' }} value="Kendaraan Roda Empat"> Kendaraan Roda Empat
                        </div>
                        <div class="col-sm-2 p-0">
                            <input type="radio" name="alat_tempuh_sekolah" {{ (old('alat_tempuh_sekolah') ? old('alat_tempuh_sekolah') : $reg->alat_tempuh_sekolah) == 'Angkutan Umum' ? 'checked' : '' }} value="Angkutan Umum"> Angkutan Umum
                        </div> 
                        <div class="col-sm-2 p-0">
                            <input type="radio" name="alat_tempuh_sekolah" {{ (old('alat_tempuh_sekolah') ? old('alat_tempuh_sekolah') : $reg->alat_tempuh_sekolah) == 'Berjalan Kaki' ? 'checked' : '' }} value="Berjalan Kaki"> Berjalan Kaki
                        </div>  
                    </div>
                    @if($errors->has('alat_tempuh_sekolah'))
                        <p class="text-danger mt-2">{{ $errors->first('alat_tempuh_sekolah') }}</p>
                    @endif
                </div>
            </div>
            @csrf
            @method('POST')
            <div class="mt-5 d-flex justify-content-end">
                    <a href="{{ url('registrasi?goto=prev') }}" class="btn btn-info">Kembali</a>
                    <input type="submit" class="ml-2 btn btn-warning" value="Simpan & Lanjutkan">
            </div>
        </form>
        <form style="display: none" action="{{ url('registrasi/2/saudara') }}" id="saudara_form" method="POST">
            <input type="text" id="saudara_nama" name="saudara_nama" value="">
            <input type="text" id="saudara_umur" name="saudara_umur" value="">
            <input type="text" id="saudara_pendidikan" name="saudara_pendidikan" value="">
            <input type="text" id="saudara_status" name="saudara_status" value="">
            @method('POST')
            @csrf
        </form>
        <form style="display: none" action="" id="saudara_delete_form" method="POST">
            @method('DELETE')
            @csrf
        </form>
    </div>
@endsection

@section('js')
    <script>
        $('#saudara-tambah-btn').click(function(e) {
            e.preventDefault();
            $('#saudara_nama').val($('#temp_saudara_nama').val());
            $('#saudara_umur').val($('#temp_saudara_umur').val());
            $('#saudara_pendidikan').val($('#temp_saudara_pendidikan').val());
            $('#saudara_status').val($('input[name="temp_saudara_status"]:checked').val());
            $('#saudara_form').submit();
        });

        $('.saudara-delete-btn').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $('#saudara_delete_form').attr('action', `{!! url('registrasi/2/saudara') !!}/${id}`);
            $('#saudara_delete_form').submit();
        });
    </script>
@endsection