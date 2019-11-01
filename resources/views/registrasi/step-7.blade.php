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
        @include('registrasi.sesi-button')
            @foreach($dokumen ?? '' as $d)
                <form id="form-{{ $d->id }}" action="{{ url('registrasi/7/dokumen/'.$d->id) }}" class="p-3" method="POST" enctype="multipart/form-data">
                    <label for="dokumen[{{ $d->id }}]">{{ $d->jenis_dokumen->nama }}</label>
                    <br>
                    <input class="inputfile" name="dokumen" id='dokumen-{{ $d->id }}' id="dokumen" type="file">
                    @if($errors->has('dokumen') && session('error-id') == $d->id)
                        <p class="text-danger">{{ $errors->first('dokumen') }}</p>   
                    @endif
                    <div class="d-flex justify-content-end" id="btn-container-{{ $d->id }}">
                        @if($d->url)
                            <a href="{{ $d->url }}" id="btn-lihat-{{ $d->id }}" target='_blank' class="btn btn-warning d-flex align-items-center">Lihat</a>
                        @endif
                        <button type="submit" data-id="{{ $d->id }}" class="ml-2 btn btn-danger d-flex align-items-center btn-submit" id="btn-submit-{{ $d->id }}">
                                Upload
                        </button> 
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
    @include('registrasi.sesi')
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
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover()
        })
        $('.btn-submit').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var jenis_dokumen_id = $(this).data('jenis');
            var fd = new FormData();
            var files =  $('#dokumen-'+id)[0].files[0];
            fd.append('file', files);
            fd.append('id', id);
            $('#btn-submit-'+id).attr('disabled', true);
            $('#btn-submit-'+id).html(`
                Mengupload
                <div class="spinner-border text-light ml-3" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            `);
            
            $.ajax({
                url: '/api/dokumen-upload',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(res) {
                    $('#dokumen-'+id).val('');
                    $('#btn-submit-'+id).html(`Upload`);
                    if($('#btn-lihat-'+id).length == 0) {
                        $('#btn-container-'+id).prepend(`
                        <a href="${res.url}" id="btn-lihat-${id}" target='_blank' class="btn btn-warning d-flex align-items-center">Lihat</a>
                        `);
                    } else {
                        $('#btn-lihat-'+id).attr('href', res.url);
                    }
                    $('#btn-submit-'+id).attr('disabled', false);
                    
                },
                error: function(res) {    
                    $('#dokumen-'+id).val('');     
                    Swal.fire(
                        'Error',
                        'upload file gagal, pastikan ukuran file dibawah 2 mb, dan extensi file adalah jpg, jpeg atau png',
                        'error'  
                    );
                    $('#btn-submit-'+id).attr('disabled', false);
                    $('#btn-submit-'+id).html(`Upload`);
                }
            })
        })
    </script>
@endsection