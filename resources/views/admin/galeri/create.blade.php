@extends('admin.master')

@section('title', 'Sunodia ~ Galeri')

@section('content')
    @component('admin.components.content')
        @slot('title', 'Galeri')
        <form action="{{ url('a/galeri') }}" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Tambah">
            </div>
            @method('POST')
            @csrf
        </form>
    @endcomponent
@endsection

@section('js')
    @if(session()->has('success'))
        <script>
            setTimeout(function() {
                Swal.fire({
                    title: 'Sukses!',
                    text: `{{ session('success') }}`,
                    type: 'success'
                });
            }, 1000); 
        </script>
    @endif
@endsection