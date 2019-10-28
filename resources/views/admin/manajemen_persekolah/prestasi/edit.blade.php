@extends('admin.master')

@section('title', 'Sunodia ~ Prestasi')

@section('content')
    <div class="mb-3 card">
        <div class="card-header-tab card-header-tab-animation card-header d-flex justify-content-between">
            <div class="card-header-title">
                <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i> Prestasi
            </div>
        </div>
        <div class="card-body">
            <img style="max-width: 500px" src="{{ $prestasi->url }}" alt="">
            <form enctype="multipart/form-data" action="{{ url('a/'.$tingkat.'/prestasi/'.$prestasi->id) }}" enctype="multipart/form-data" method="POST">
                <div class="form-group">
                    <label>Nama (Pisahkan dengan koma apabila lebih dari satu nama)</label>
                    <input type="text" class="form-control" name="nama" value="{{ old('nama') ? old('nama') : $prestasi->nama }}">
                    @if($errors->has('nama'))
                        <p class="text-danger">{{ $errors->first('nama') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Nama Lomba</label>
                    <input type="text" class="form-control" name="nama_lomba" value="{{ old('nama_lomba') ? old('nama_lomba') : $prestasi->nama_lomba }}">
                    @if($errors->has('nama_lomba'))
                        <p class="text-danger">{{ $errors->first('nama_lomba') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Juara Ke</label>
                    <input type="text" class="form-control" name="juara" value="{{ old('juara') ? old('juara') : $prestasi->juara }}">
                    @if($errors->has('juara'))
                        <p class="text-danger">{{ $errors->first('juara') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Tingkat Lomba</label>
                    <input type="text" class="form-control" name="tingkat_lomba" value="{{ old('tingkat_lomba') ? old('tingkat_lomba') : $prestasi->tingkat_lomba }}">
                    @if($errors->has('tingkat_lomba'))
                        <p class="text-danger">{{ $errors->first('tingkat_lomba') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" class="form-control" name="foto" value="{{ old('foto') }}">
                    @if($errors->has('foto'))
                        <p class="text-danger">{{ $errors->first('foto') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Update">
                </div>
                @csrf
                @method('POST')

            </form>
        </div>
    </div>
@endsection