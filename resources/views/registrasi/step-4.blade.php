@extends('master')

@section('title', 'Registrasi 4/7')

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
    <div class="container p-0 bg-white register-box mt-3">
        <h5 class="m-0"><img height='40' src="https://img.icons8.com/dotty/80/000000/note.png"> Registrasi - Keterangan Kesehatan (4/7)</h5>
        @include('registrasi.sesi-button')
        <div class="m-1 alert alert-warning font-italic">Ket: Semua field yang bertanda bintang wajib diisi</div>
        <form action="{{ url('registrasi/4') }}" class="p-3" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-sm-4">
                    <label>Golongan Darah *</label>
                    <br>
                    <input type="radio" name="golongan_darah" value='A' {{ (old('golongan_darah') ? old('golongan_darah') : $reg->golongan_darah) == 'A' ? 'checked' : '' }} class="ml-1"> A
                    <input type="radio" name="golongan_darah" value='B' {{ (old('golongan_darah') ? old('golongan_darah') : $reg->golongan_darah) == 'B' ? 'checked' : '' }} class="ml-1"> B
                    <input type="radio" name="golongan_darah" value='AB' {{ (old('golongan_darah') ? old('golongan_darah') : $reg->golongan_darah) == 'AB' ? 'checked' : '' }} class="ml-1"> AB
                    <input type="radio" name="golongan_darah" value='O' {{ (old('golongan_darah') ? old('golongan_darah') : $reg->golongan_darah) == 'O' ? 'checked' : '' }} class="ml-1"> O
                    @if($errors->has('golongan_darah'))
                        <p class="text-danger">{{ $errors->first('golongan_darah') }}</p>
                    @endif
                </div>
                <div class="form-group col-sm-4">
                        <label>Rhesus *</label>
                        <br>
                        <select name="rhesus" id="" class="form-control">
                            <option value="positif" {{ (old('rhesus') ? old('rhesus') : $reg->rhesus) == 'positif' ? 'selected' : '' }}>Positif</option>
                            <option value="negatif" {{ (old('rhesus') ? old('rhesus') : $reg->rhesus) == 'negatif' ? 'selected' : '' }}>Negatif</option>
                        </select>
                        @if($errors->has('rhesus'))
                            <p class="text-danger">{{ $errors->first('rhesus') }}</p>
                        @endif
                    </div>
                <div class="form-group col-sm-4">
                    <label>Pernah Melakukan Donor *</label>
                    <br>
                    <input type="radio" name="pernah_melakukan_donor" value="0" {{ (old('pernah_melakukan_donor') ? old('pernah_melakukan_donor') : $reg->pernah_melakukan_donor) == 0 ? 'checked' : '' }} class="ml-1"> Ya
                    <input type="radio" name="pernah_melakukan_donor" value="1" {{ (old('pernah_melakukan_donor') ? old('pernah_melakukan_donor') : $reg->pernah_melakukan_donor) == 1 ? 'checked' : '' }} class="ml-1"> Tidak
                </div>
                @if($errors->has('pernah_melakukan_donor'))
                    <p class="text-danger">{{ $errors->first('pernah_melakukan_donor') }}</p>
                @endif
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label>Penyakit Yang Pernah di derita</label>
                    <input type="text" name="penyakit_yang_pernah_diderita" value="{{ old('penyakit_yang_pernah_diderita') ? old('penyakit_yang_pernah_diderita') : $reg->penyakit_yang_pernah_diderita }}" class="form-control">
                    @if($errors->has('penyakit_yang_pernah_diderita'))
                        <p class="text-danger">{{ $errors->first('penyakit_yang_pernah_diderita') }}</p>
                    @endif
                </div>
                <div class="form-group col-sm-6">
                    <label>Berkebutuhan Khusus</label>
                   <select name="berkebutuhan_khusus" class="form-control" id="">
                        <option value="tidak" {{ (old('berkebutuhan_khusus') ? old('berkebutuhan_khusus') : $reg->berkebutuhan_khusus) == 'ya' ? 'selected' : '' }}>Tidak</option>
                        <option value="ya" {{ (old('berkebutuhan_khusus') ? old('berkebutuhan_khusus') : $reg->berkebutuhan_khusus) == 'tidak' ? 'selected' : '' }}>Ya</option>
                   </select>
                    @if($errors->has('berkebutuhan_khusus'))
                        <p class="text-danger">{{ $errors->first('berkebutuhan_khusus') }}</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label>Tinggi Badan *</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="tinggi_badan" value="{{ old('tinggi_badan') ? old('tinggi_badan') : $reg->tinggi_badan }}" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">CM</span>
                        </div>
                    </div>
                    @if($errors->has('tinggi_badan'))
                        <p class="text-danger">{{ $errors->first('tinggi_badan') }}</p>
                    @endif
                </div>
                <div class="form-group col-sm-6">
                    <label>Berat Badan *</label>
                    <div class="input-group mb-3">
                        <input type="text" name="berat_badan" value="{{ old('berat_badan') ? old('berat_badan') : $reg->berat_badan }}" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">KG</span>
                        </div>
                    </div>
                    @if($errors->has('berat_badan'))
                        <p class="text-danger">{{ $errors->first('berat_badan') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Ciri khusus lainnya</label>
                <textarea class="form-control" name="ciri_khusus_lainnya">{{ old('ciri_khusus_lainnya') ? old('ciri_khusus_lainnya') : $reg->ciri_khusus_lainnya }}</textarea>
                @if($errors->has('ciri_khusus_lainnya'))
                    <p class="text-danger">{{ $errors->first('ciri_khusus_lainnya') }}</p>
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
    @include('registrasi.sesi')
@endsection

@section('js')
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover()
        })
    </script>
@endsection