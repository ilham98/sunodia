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
    <link rel="stylesheet" href="{{ asset('css/swal.css') }}">
@endsection

@section('content')
    <div class="container mt-3 p-0 bg-white register-box">
        <h5 class="m-0"><img height='40' src="https://img.icons8.com/dotty/80/000000/note.png"> Registrasi (1/7)</h5>
        @include('registrasi.sesi-button')
        <form action="{{ url('registrasi/1') }}" class="mt-3 px-3 pb-3" method="POST">
            <div class="m-3" style="color: #707070">
                Pilih Kelas Tujuan
            </div>
            <input type="radio" {{ (old('tingkat') ? old('tingkat') : $reg->tingkat) == '1' ? 'checked' : '' }} class="ml-3" value="1" name="tingkat">
            <div class='ml-3 tingkat'>KB Kecil</div>
            <hr>
            <input type="radio" {{ (old('tingkat') ? old('tingkat') : $reg->tingkat) == '2' ? 'checked' : '' }} class="ml-3" value="2" name="tingkat">
            <div class='ml-3 tingkat'>KB Besar</div>
            <hr>
            <input type="radio" {{ (old('tingkat') ? old('tingkat') : $reg->tingkat) == '3' ? 'checked' : '' }} class="ml-3" value="3" name="tingkat">
            <div class='ml-3 tingkat'>TK A</div>
            <hr>
            <input type="radio" {{ (old('tingkat') ? old('tingkat') : $reg->tingkat) == '4' ? 'checked' : '' }} class="ml-3" value="4" name="tingkat">
            <div class='ml-3 tingkat'>TK B</div>
            <hr>
            <input type="radio" {{ (old('tingkat') ? old('tingkat') : $reg->tingkat) == '5' ? 'checked' : '' }} class="ml-3" value="5" name="tingkat">
            <div class='ml-3 tingkat'>SD</div>
            <hr>
            <input type="radio" {{ (old('tingkat') ? old('tingkat') : $reg->tingkat) == '6' ? 'checked' : '' }} class="ml-3" value="6" name="tingkat">
            <div class='ml-3 tingkat'>SMP</div>
            <hr>
            <input type="radio" {{ (old('tingkat') ? old('tingkat') : $reg->tingkat) == '7' ? 'checked' : '' }} class="ml-3" value="7" name="tingkat">
            <div class='ml-3 tingkat'>SMA</div>
            <div class="m-3 d-flex justify-content-end">
                <input type="submit" value="Simpan & Lanjutkan" class="btn btn-warning">
            </div>
            @csrf
            @method('POST')
        </form>
    </div>
    @include('registrasi.sesi')
@endsection

@section('js')
    <script src="{{ asset('/js/swal.js') }}"></script>
    <script>
        $("input[name='tingkat']").click(function() {
            var tingkat = $("input[name='tingkat']:checked").val();
            if(tingkat == 1) {
                alertBatasUsia('Batas Usia untuk KB Kecil adalah ...');
            } else if(tingkat == 2) {
                alertBatasUsia('mantap');
            } else if(tingkat == 3) {
                alertBatasUsia('mantap');
            } else if(tingkat == 4) { 
                alertBatasUsia('mantap');
            }
        })

        function alertBatasUsia(message) {
            Swal.fire(
                'Warning',
                message,
                'warning'
            );
        }

        $(function () {
            $('[data-toggle="popover"]').popover()
        })
        
    </script>
@endsection