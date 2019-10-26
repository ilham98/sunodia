@extends('master')

@section('title', 'Registrasi 3/7')

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
        <h5 class="m-0"><img height='40' src="https://img.icons8.com/dotty/80/000000/note.png"> Registrasi - Keterangan Pendidikan Sebelumnya (3/7)</h5>
        <form action="{{ url('registrasi/3') }}" class="p-3" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Asal Sekolah</label>
                <input name="asal_sekolah" placeholder="@if($reg->tingkat == 1 || $reg->tingkat == 2) (Kosongkan Jika Tidak Ada) @endif" type="text" class="form-control" value="{{ old('asal_sekolah') ? old('asal_sekolah') : $reg->asal_sekolah }}">
                @if($errors->has('asal_sekolah'))
                    <p class="text-danger">{{ $errors->first('asal_sekolah') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>Alamat Sekolah</label>
                <textarea name="alamat_sekolah" id="" placeholder="@if($reg->tingkat == 1 || $reg->tingkat == 2) (Kosongkan Jika Tidak Ada) @endif" class="form-control">{{ old('alamat_sekolah') ? old('alamat_sekolah') : $reg->alamat_sekolah }}</textarea>
                @if($errors->has('alamat_sekolah'))
                    <p class="text-danger">{{ $errors->first('alamat_sekolah') }}</p>
                @endif
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label>Nomor Ijasah</label>
                    <input name="nomor_ijazah" placeholder="(Kosongkan Jika Tidak Ada)" value="{{ old('nomor_ijazah') ? old('nomor_ijazah') : $reg->nomor_ijazah }}" type="text" class="form-control">
                    @if($errors->has('nomor_ijazah'))
                        <p class="text-danger">{{ $errors->first('nomor_ijazah') }}</p>
                    @endif
                </div>
                <div class="form-group col-sm-6">
                    <label>Lama Belajar</label>
                    <input name="lama_belajar" placeholder="@if($reg->tingkat == 1 || $reg->tingkat == 2) (Kosongkan Jika Tidak Ada) @endif" value="{{ old('lama_belajar') ? old('lama_belajar') : $reg->lama_belajar}}" type="text" class="form-control">
                    @if($errors->has('lama_belajar'))
                        <p class="text-danger">{{ $errors->first('lama_belajar') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Jumlah Nilai Ijasah</label>
                <input name="jumlah_nilai_ijazah" placeholder="(Kosongkan Jika Tidak Ada)" value="{{ old('jumlah_nilai_ijazah') ? old('jumlah_nilai_ijazah') : $reg->jumlah_nilai_ijazah }}"  type="text" class="form-control">
                @if($errors->has('jumlah_nilai_ijazah'))
                    <p class="text-danger">{{ $errors->first('jumlah_nilai_ijazah') }}</p>
                @endif
            </div>
            @csrf
            @method('POST')
            <div class="mt-5 d-flex justify-content-end">
                    <a href="{{ url('registrasi?goto=prev') }}" class="btn btn-info">Kembali</a>
                    <input type="submit" class="ml-2 btn btn-warning" value="Simpan & Lanjutkan">
                </div>
        </form>
    </div>
@endsection