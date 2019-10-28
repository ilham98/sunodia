@extends('admin.master')

@section('title', 'Sunodia ~ Galeri')

@section('content')
    <div class="mb-3 card">
        <div class="card-header-tab card-header-tab-animation card-header">
            <div class="card-header-title">
                <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i> Galeri {{ strtoupper($tingkat) }}
            </div>
        </div>
        <div class="card-body">
        <form action="{{ url('a/'.$tingkat.'/galeri') }}" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Tambah">
            </div>
            @method('POST')
            @csrf
        </form>
        </div>
    </div>
@endsection

@section('js')
    @if(session()->has('success'))
        <script>
            Swal.fire({
                title: 'Sukses!',
                text: `{{ session('success') }}`,
                type: 'success'
            });
        </script>
    @endif
@endsection