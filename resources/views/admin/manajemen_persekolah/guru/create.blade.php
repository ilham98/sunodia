@extends('admin.master')

@section('title', 'Sunodia ~ Profil '.strtoupper($tingkat))

@section('css')
    <link href="{{ asset('css/quill.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="mb-3 card">
        <div class="card-header-tab card-header-tab-animation card-header">
            <div class="card-header-title">
                <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i> Guru {{ strtoupper($tingkat) }}
            </div>
        </div>
        <div class="card-body">
            <form action="{{ url('a/'.$tingkat.'/guru') }}" class="col-sm-6" method="POST">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" value="{{ old('nama') }}" class="form-control">
                    @if($errors->has('nama'))
                        <p class="text-danger">{{ $errors->first('nama') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Jabatan</label>
                    <input type="text" name="jabatan" value="{{ old('jabatan') }}" class="form-control">
                    @if($errors->has('jabatan'))
                        <p class="text-danger">{{ $errors->first('jabatan') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Pengampu Mata Pelajaran</label>
                    <input type="text" name="pengampu_mata_pelajaran" value="{{ old('pengampu_mata_pelajaran') }}" class="form-control">
                    @if($errors->has('pengampu_mata_pelajaran'))
                        <p class="text-danger">{{ $errors->first('pengampu_mata_pelajaran') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Simpan">
                </div>
                @csrf
                @method('POST')
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/quill.js') }}"></script>
    @if(session('success'))
        <script>
            Swal.fire(
                'success',
                `{!! session('success') !!}`,
                'success'
            );
        </script>
    @endif
@endsection