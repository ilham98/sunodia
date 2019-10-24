@extends('master')

@section('title', 'Registrasi 1/7')

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

        .tingkat {
            background: #ff8921;
            color: white;
            border-radius: 15px;
            display: inline-block;
            padding: 5px 20px;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .pilihan-tingkat {
            justify-content: center;
        }
    </style>
@endsection

@section('content')
    <div style='height: 60px; background: #0067c2'></div>
    <div class="container mt-3 p-0 bg-white register-box">
        <h5 class="m-0"><img height='40' src="https://img.icons8.com/dotty/80/000000/note.png"> Registrasi (1/7)</h5>
        <form action="{{ url('registrasi/1') }}" class="mt-3 px-3 pb-3" method="POST">
            <div class="m-3" style="color: #707070">
                Pilih Kelas Tujuan
            </div>
            <div class='ml-3 tingkat'>KB</div>
            <input type="radio" {{ (old('tingkat') ? old('tingkat') : $reg->tingkat) == '-3' ? 'checked' : '' }} class="ml-3" value="-3" name="tingkat"> KB Kecil
            <input type="radio" {{ (old('tingkat') ? old('tingkat') : $reg->tingkat) == '-2' ? 'checked' : '' }} class="ml-3" value="-2" name="tingkat"> KB Besar
            <hr>
            <div class='ml-3 tingkat'>TK</div>
            <input type="radio" {{ (old('tingkat') ? old('tingkat') : $reg->tingkat) == '-1' ? 'checked' : '' }} class="ml-3" value="-1" name="tingkat"> TK A
            <input type="radio" {{ (old('tingkat') ? old('tingkat') : $reg->tingkat) == '0' ? 'checked' : '' }} class="ml-3" value="0" name="tingkat"> TK B
            <hr>
            <div class='ml-3 tingkat'>SD</div>
            <input type="radio" {{ (old('tingkat') ? old('tingkat') : $reg->tingkat) == '1' ? 'checked' : '' }} class="ml-3" value="1" name="tingkat"> 1
            <input type="radio" {{ (old('tingkat') ? old('tingkat') : $reg->tingkat) == '2' ? 'checked' : '' }} class="ml-3" value="2" name="tingkat"> 2
            <input type="radio" {{ (old('tingkat') ? old('tingkat') : $reg->tingkat) == '3' ? 'checked' : '' }} class="ml-3" value="3" name="tingkat"> 3
            <input type="radio" {{ (old('tingkat') ? old('tingkat') : $reg->tingkat) == '4' ? 'checked' : '' }} class="ml-3" value="4" name="tingkat"> 4
            <input type="radio" {{ (old('tingkat') ? old('tingkat') : $reg->tingkat) == '5' ? 'checked' : '' }} class="ml-3" value="5" name="tingkat"> 5
            <input type="radio" {{ (old('tingkat') ? old('tingkat') : $reg->tingkat) == '6' ? 'checked' : '' }} class="ml-3" value="6" name="tingkat"> 6
            <hr>
            <div class='ml-3 tingkat'>SMP</div>
            <input type="radio" {{ (old('tingkat') ? old('tingkat') : $reg->tingkat) == '7' ? 'checked' : '' }} class="ml-3" value="7" name="tingkat"> 7
            <input type="radio" {{ (old('tingkat') ? old('tingkat') : $reg->tingkat) == '8' ? 'checked' : '' }} class="ml-3" value="8" name="tingkat"> 8
            <input type="radio" {{ (old('tingkat') ? old('tingkat') : $reg->tingkat) == '9' ? 'checked' : '' }} class="ml-3" value="9" name="tingkat"> 9
            <hr>
            <div class='ml-3 tingkat'>SMA</div>
            <input type="radio" {{ (old('tingkat') ? old('tingkat') : $reg->tingkat) == '10' ? 'checked' : '' }} class="ml-3" value="10" name="tingkat"> 10
            <input type="radio" {{ (old('tingkat') ? old('tingkat') : $reg->tingkat) == '11' ? 'checked' : '' }} class="ml-3" value="11" name="tingkat"> 11
            <input type="radio" {{ (old('tingkat') ? old('tingkat') : $reg->tingkat) == '12' ? 'checked' : '' }} class="ml-3" value="12" name="tingkat"> 12

            <div class="m-3 d-flex justify-content-end">
                <input type="submit" value="Simpan & Lanjutkan" class="btn btn-warning">
            </div>
            @csrf
            @method('POST')
        </form>
    </div>
@endsection