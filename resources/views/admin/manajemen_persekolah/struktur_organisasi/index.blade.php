@extends('admin.master')

@section('title', 'Sunodia ~ Struktur Organisasi '.strtoupper($tingkat))

@section('css')
    <link href="{{ asset('css/quill.css') }}" rel="stylesheet">

    <style>
        .card-body img {
            width: 100%;
        }
    </style>
@endsection

@section('content')
    <div class="mb-3 card">
        <div class="card-header-tab card-header-tab-animation card-header">
            <div class="card-header-title">
                <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i> Struktur Organisasi {{ strtoupper($tingkat) }}
            </div>
        </div>
        <div class="card-body">
            <form action="{{ url('a/'.$tingkat.'/struktur-organisasi') }}" enctype="multipart/form-data" method="POST">
                <img src="{{ $struktur_organisasi->url }}" alt="">
                <div class="form-group">
                    <label for="">Gambar Struktur Organisasi</label>
                    <br>
                    <input type="file" name="struktur_organisasi">
                </div>
                <div class="form-group">
                    <input type="submit" value="Update Gambar Struktur Organisasi" class="btn btn-primary">
                </div>
                @csrf
                @method('POST')
            </form>
            <!-- Button trigger modal -->
            
            <div class="d-flex mb-2 justify-content-between align-items-center">
                <div>Daftar Guru</div>
                <div>
                    <a href="{{ url('a/'.$tingkat.'/guru/tambah') }}" class="btn btn-primary">
                        Tambah Guru
                    </a>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Guru</th>
                        <th>Jabatan</th>
                        <th>Pengampu Mata Pelajaran</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($guru as $i => $g)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $g->nama }}</td>
                            <td>{{ $g->jabatan }}</td>
                            <td>{{ $g->pengampu_mata_pelajaran }}</td>
                            <td>
                                <a href="{{ url('/a/'.$tingkat.'/guru/'.$g->id.'/edit') }}">Edit</a>
                                <a href="" data-id='{{ $g->id }}' id="btn-hapus" class="text-danger">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    
        </div>
        <form action="" id="form-hapus" method="POST" hidden>
            @csrf
            @method('DELETE')
        </form>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/swal.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script>
        $('#btn-tambah').click(function() {
            $('#form').submit();
        })

        $('#btn-hapus').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $('#form-hapus').attr('action', `/a/{!! $tingkat !!}/guru/${id}`);
            $('#form-hapus').submit();
        });
    </script>
    @if(session('success'))
        <script>
            Swal.fire(
                'Sukses',
                `{!! session('success') !!}`,
                'success'
            );
        </script>
    @endif

    @if($errors->any())
        <script>
           $('#exampleModal').modal('show');
        </script>
    @endif
@endsection