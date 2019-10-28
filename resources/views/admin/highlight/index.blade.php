@extends('admin.master')

@section('title', 'Sunodia ~ Highlight')

@section('css')
    <link href="{{ asset('css/quill.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="mb-3 card">
        <div class="card-header-tab card-header-tab-animation card-header">
            <div class="card-header-title">
                <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i> Highlight
            </div>
        </div>
        <div class="card-body">
            @for($x=1; $x <= 5; $x++)
                @php
                    $h = $highlight->first(function($h) use($x) {
                        return $h->id == $x;
                    });
                @endphp
                @if($h)
                    <div>
                        <img src="{{ $h->url }}" style="width: 100%" alt="">
                        <div class="alert alert-success">{{ $h->keterangan }}</div>
                    </div>
                @endif
                <div class='mb-3'>
                    <button type="button" data-id="{{ $x }}" class="btn btn-primary btn-tambah" data-toggle="modal" data-target="#exampleModal">
                        {{ $h ? 'Ubah' : '' }} Highlight {{ $x }}
                    </button>
                    @if($h)
                    <button type="button" data-id="{{ $x }}" class="btn btn-danger btn-hapus">Hapus highlight {{ $x }}</button>
                    @endif
                </div>
                <hr>
            @endfor
        </div>
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
                <form id="form" action="{{ url('a/highlights') }}" enctype="multipart/form-data" method='POST'>
                    <input type="text" name="id" id="id" hidden>
                    <div class="form-group">
                        <label>Keterangan Gambar</label>
                        <input type="text" name="keterangan" class="form-control" value="{{ old('keterangan') }}">
                        @if($errors->has('keterangan'))
                            <p class="text-danger">{{ $errors->first('keterangan') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>File Gambar</label>
                        <input type="file" name="img" class="form-control" value="{{ old('img') }}">
                        @if($errors->has('img'))
                            <p class="text-danger">{{ $errors->first('img') }}</p>
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
    <script src="{{ asset('js/swal.js') }}"> </script>

    @if(session('success'))
        <script>
            Swal.fire(
                'success',
                `{!! session('success') !!}`,
                'success'
            );
        </script>
    @endif

    <script>
        $('.btn-tambah').click(function() {
            $('#id').val($(this).data('id'));
            
        })

        $('#btn-tambah').click(function() {
            $('#form').submit();
        });

        $('.btn-hapus').click(function() {
            $('#delete-form').attr('action', '/a/highlights/'+$(this).data('id'));
            $('#delete-form').submit();
        })
    </script>
@endsection