@extends('admin.master')

@section('title', 'Sunodia ~ Galeri')

@section('content')
    @component('admin.components.content')
        @slot('title', 'Galeri')
        <form action="{{ url('a/galeri/'.$album->id) }}" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="nama" value="{{ old('nama') ? old('nama') : $album->nama }}">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Update Nama Album">
            </div>
            @method('PUT')
            @csrf
        </form>
        <div>
            @if($photos->count() != 0)
                @foreach($photos as $p)
                    <form action="{{ url('a/galeri/'.$album->id.'/photos/'.$p->id) }}" method="POST">
                        <img style="max-height: 200px" src="{{ $p->url }}" alt="">
                        <div>
                            <input type="submit" class="btn btn-danger mt-2" value="Hapus">
                        </div>
                        @method('DELETE')
                        @csrf
                    </form>
                @endforeach
            @else
                <div class="my-3 alert alert-warning">
                    Belum ada foto yang ditambahkan
                </div>
            @endif
            <form enctype="multipart/form-data" action="{{ url('a/galeri/'.$album->id.'/photos') }}" method="POST">
                <div class="form-group">
                    <input type="file" name="photo">
                    @if($errors->has('photo'))
                        <p class="text-danger">{{ $errors->first('photo') }}</p>
                    @endif
                </div>
                
                <div>
                    <input type="submit" value="Tambah Foto" class="btn btn-success mt-2">
                </div>
                @method('POST')
                @csrf
            </form>
        </div>
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