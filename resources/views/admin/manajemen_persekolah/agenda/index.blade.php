@extends('admin.master')

@section('title', 'Sunodia ~ Fasilitas '.strtoupper($tingkat))

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
                <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i> Agenda {{ strtoupper($tingkat) }}
            </div>
        </div>
        <div class="card-body">
            <form action="{{ url('a/'.$tingkat.'/poster-penerimaan-siswa-baru') }}" enctype="multipart/form-data" method="POST">
                <img src="{{ $agenda->url_poster_penerimaan_siswa_baru }}" alt="">
                <div class="form-group">
                    <label for="">Poster Penerimaan Siswa Baru</label>
                    <br>
                    <input type="file" name="poster_penerimaan_siswa_baru">
                </div>
                <div class="form-group">
                    <input type="submit" value="Update Poster" class="btn btn-primary">
                </div>
                @csrf
                @method('POST')
            </form>
            <hr>
            <form action="{{ url('a/'.$tingkat.'/kalender-pendidikan') }}" enctype="multipart/form-data" method="POST">
                <img src="{{ $agenda->url_kalender_pendidikan }}" alt="">
                <div class="form-group">
                    <label for="">Kelendar Pendidikan</label>
                    <br>
                    <input type="file" name="kalender_pendidikan">
                </div>
                <div class="form-group">
                    <input type="submit" value="Update Kalendar Pendidikan" class="btn btn-primary">
                </div>
                @csrf
                @method('POST')
            </form>
            <!-- Button trigger modal -->
            
            <div class="d-flex mb-2 justify-content-between align-items-center">
                <div>Daftar Kegiatan</div>
                <div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Tambah Kegiatan
                    </button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kegiatan</th>
                        <th>Tanggal Mulai Pelaksanaan</th>
                        <th>Tanggal Selesai Pelaksanaan</th>
                        <th>Pelaksana</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kegiatan as $i => $k)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $k->nama }}</td>
                            <td>{{ $k->tanggal_mulai_pelaksanaan }}</td>
                            <td>{{ $k->tanggal_selesai_pelaksanaan }}</td>
                            <td>{{ $k->pelaksana }}</td>
                            <td><a href="" data-id='{{ $k->id }}' id="btn-hapus" class="text-danger">Hapus</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    
        </div>
        <form action="{{ url('a/'.$tingkat.'/fasilitas') }}" id="form" method="POST" hidden>
            <textarea name="text" id="text" id="" cols="30" rows="10"></textarea>
            @csrf
            @method('PUT')
        </form>
    </div>
@endsection

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="form" action="{{ url('a/'.$tingkat.'/agenda-kegiatan') }}" method='POST'>
                    <div class="form-group">
                        <label>Kegiatan</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
                        @if($errors->has('nama'))
                            <p class="text-danger">{{ $errors->first('nama') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Tanggal Mulai Pelaksanaan</label>
                        <input type="date" name="tanggal_mulai_pelaksanaan" class="form-control" value="{{ old('tanggal_mulai_pelaksanaan') }}">
                        @if($errors->has('tanggal_mulai_pelaksanaan'))
                            <p class="text-danger">{{ $errors->first('tanggal_mulai_pelaksanaan') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Tanggal Selesai Pelaksanaan</label>
                        <input type="date" name="tanggal_selesai_pelaksanaan" class="form-control" value="{{ old('tanggal_selesai_pelaksanaan') }}">
                        @if($errors->has('tanggal_selesai_pelaksanaan'))
                            <p class="text-danger">{{ $errors->first('tanggal_selesai_pelaksanaan') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Pelaksana</label>
                        <input type="text" name="pelaksana" class="form-control" value="{{ old('pelaksana') }}">
                        @if($errors->has('pelaksana'))
                            <p class="text-danger">{{ $errors->first('pelaksana') }}</p>
                        @endif
                    </div>
                    @csrf
                    @method('POST')
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="btn-tambah">Tambah Kegiatan</button>
            </div>
            <form action="" method="POST" id="delete-form" style="display: none">
                @csrf
                @method('DELETE')
            </form>
          </div>
        </div>
      </div>

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
            $('#delete-form').attr('action', `/a/{!! $tingkat !!}/agenda-kegiatan/${id}`);
            $('#delete-form').submit();
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