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
                    <form action="{{ url('a/galeri/'.$album->id.'/photos/'.$p->id) }}" class="mb-4" method="POST">
                        <img style="max-height: 200px" src="{{ $p->url }}" alt="">
                        <div class="alert alert-primary col-sm-6">
                            <div>Keterangan Foto:</div>
                            <div style="font-weight: bold">{{ $p->caption }}</div>
                        </div>
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
            <hr>
            <form enctype="multipart/form-data" action="{{ url('a/'.$tingkat.'/galeri/'.$album->id.'/photos') }}" method="POST">
                <div class="form-group">
                    <input type="file" name="photo">
                    @if($errors->has('photo'))
                        <p class="text-danger">{{ $errors->first('photo') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Keterangan Foto</label>
                    <input type="text" name="caption" class="form-control col-sm-6">
                    @if($errors->has('caption'))
                        <p class="text-danger">{{ $errors->first('caption') }}</p>
                    @endif
                </div>
                
                <div>
                    <input type="submit" value="Tambah Foto" class="btn btn-success mt-2">
                </div>
                @method('POST')
                @csrf
            </form>
        </div>
    </div>
    </div>
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