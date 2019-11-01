@extends('master')

@section('title', 'Registrasi 5/7')

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
        <h5 class="m-0"><img height='40' src="https://img.icons8.com/dotty/80/000000/note.png"> Registrasi - Keterangan Kegemaran Hobby & Prestasi (5/7)</h5>
        @include('registrasi.sesi-button')
        <form action="{{ url('registrasi/5/kegemaran') }}" method="POST" class="px-3 pt-3">
            <div class="form-group">
                Kegemaran / Hobby
                @if($kegemaran->count() > 0)
                    <ol>
                        @foreach($kegemaran as $k)
                        <li>{{ $k->nama }} ({{ $k->jenis }}) <i style="cursor: pointer" class="fas fa-trash text-danger ml-2 btn-remove" data-id='{{ $k->id }}' data-type='kegemaran'></i></li>
                        @endforeach
                    </ol>
                @else
                    <p class="my-3">---- Kegemaran belum ditambahkan ----</p>
                @endif
            </div>
            <div class="my-3">
                <a href="" data-toggle="modal" class="open-modal" data-target="#exampleModal" data-type='kegemaran'>Tambah Kegemaran</a>
            </div>
            @csrf
            @method('POST')
        </form>
        <hr>
        <form class="px-3" method="POST" action="{{ url('registrasi/5/prestasi') }}">
            <div class="form-group">
                Prestasi
                @if($prestasi->count() > 0)
                    <ol>
                        @foreach($prestasi as $p)
                            <li>{{ $p->nama }} ({{ $p->jenis }}) <i style="cursor: pointer" class="fas fa-trash text-danger ml-2 btn-remove" data-id='{{ $p->id }}' data-type='prestasi'></i></li>
                        @endforeach
                    </ol>
                @else
                    <p class="my-3">---- Prestasi belum ditambahkan ----</p>
                @endif
            </div>
            <div class="my-3">
                    <a href="" data-toggle="modal" class="open-modal" data-target="#exampleModal" data-type='prestasi'>Tambah Prestasi</a>
                </div>
            @csrf
            @method('POST')
        </form>
        <form action="{{ url('registrasi/5') }}" class="p-3" method="POST" enctype="multipart/form-data">
            <div class="mt-5 d-flex justify-content-end">
                <a href="{{ url('registrasi?goto=prev') }}" class="btn btn-info">Kembali</a>
                <input type="submit" class="ml-2 btn btn-warning" value="Simpan & Lanjutkan">
            </div>
            @csrf
            @method('POST')
        </form>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel"></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="form">
                    <div class="form-group">
                        <label id="label-nama">Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
                        @if($errors->has('nama'))
                            <p class="text-danger">{{ $errors->first('nama') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Jenis</label>
                        <select name="jenis" id="" class="form-control">
                            <option value="">Pilih Jenis</option>
                            <option value="Akademik" {{ old('jenis') == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                            <option value="Seni" {{ old('jenis') == 'Seni' ? 'selected' : '' }}>Seni</option>
                            <option value="Olahraga" {{ old('Olahraga') == 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
                            <option value="Lainnya" {{ old('Lainnya') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @if($errors->has('jenis'))
                            <p class="text-danger">{{ $errors->first('jenis') }}</p>
                        @endif
                    </div>
                    @csrf
                    @method('POST')
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="btn-tambah">Tambah </button>
            </div>
            </div>
        </div>
    </div>
    <form action="" id="form2" method="POST">
        @method('DELETE')
        @csrf
    </form>
    @include('registrasi.sesi')
@endsection

@section('js')
    <script src="https://use.fontawesome.com/releases/v5.11.2/js/all.js" data-auto-replace-svg="nest"></script>
    <script>
       $('.open-modal').click(function() {
            var type = $(this).data('type');
            var extra = 'Tambah ' + type.charAt(0).toUpperCase() + type.slice(1);
            $('#form').attr('action', `{!! url('registrasi/5') !!}/` + type);
            $('#label-nama').html('Nama '+ type.charAt(0).toUpperCase() + type.slice(1))
            $('.modal-title').html(extra);
            $('#btn-tambah').html(extra);
       });

       $('#btn-tambah').click(function(e) {
           $('#form').submit();
       });

       $('.btn-remove').click(function(e) {
           $('#form2').attr('action', '/registrasi/5/'+$(this).data('type')+'/'+$(this).data('id'));
           $('#form2').submit();
       });
    </script>

    @if($errors->any())
        <script>
            var type = `{!! session('error-type') !!}`;
            var extra = 'Tambah ' + type.charAt(0).toUpperCase() + type.slice(1);
            $('#label-nama').html('Nama '+ type.charAt(0).toUpperCase() + type.slice(1));
            $('#form').attr('action', `{!! url('registrasi/5') !!}/` + type);
            $('.modal-title').html(extra);
            $('#btn-tambah').html(extra);
            $('#exampleModal').modal('show');
            $('.modal-title').html({!! session('modal-title') !!});
        </script>
    @endif

    <script>
        $(function () {
            $('[data-toggle="popover"]').popover()
        })
    </script>
@endsection