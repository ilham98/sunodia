@extends('master')

@section('title', 'Registrasi 7/7')

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

        label {
            color: #707070;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/swal.css') }}">
@endsection

@section('content')
    <div class="container p-0 bg-white register-box mt-3">
        <h5 class="m-0"><img height='40' src="https://img.icons8.com/dotty/80/000000/note.png"> Registrasi - Upload Berkas (7/7)</h5>
            @foreach($dokumen ?? '' as $d)
                <form action="{{ url('registrasi/7/dokumen/'.$d->id) }}" class="p-3" method="POST" enctype="multipart/form-data">
                    <label for="dokumen[{{ $d->id }}]">{{ $d->jenis_dokumen->nama }}</label>
                    <br>
                    <input class="inputfile" name="dokumen" target='_blank' id="dokumen" type="file">
                    @if($errors->has('dokumen') && session('error-id') == $d->id)
                        <p class="text-danger">{{ $errors->first('dokumen') }}</p>   
                    @endif
                    <div class="d-flex justify-content-end">
                        @if($d->url)
                            <a href="{{ $d->url }}" class="btn btn-warning">Lihat</a>
                        @endif
                        <input type="submit" class="ml-2 btn btn-danger" value="Upload{{ $d->url ? ' Ulang' : ''}}">
                    </div>
                    <hr>
                    @csrf
                    @method('POST')
                </form>
            @endforeach
            <form action="{{ url('registrasi/7') }}" class="p-3" method="POST" enctype="multipart/form-data">
                <div class="mt-5 d-flex justify-content-end">
                    <a href="{{ url('registrasi?goto=prev') }}" class="btn btn-info">Kembali</a>
                    <input type="submit" class="ml-2 btn btn-warning" value="Simpan & Lanjutkan">
                </div>
                @csrf
                @method('POST')
            </form>
    </div>
@endsection

@section('js')
    <script src="{{ asset('/js/swal.js') }}"></script>
    @if(session('error'))
        <script>
            Swal.fire(
                'Error',
                `{!! session('error') !!}`, 
                'error'
            );
        </script>
    @endif
@endsection