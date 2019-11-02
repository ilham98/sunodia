@extends('admin.master')

@section('title', 'Sunodia ~ Ganti Password')

@section('content')
    <div class="mb-3 card">
        <div class="card-header-tab card-header-tab-animation card-header">
            <div class="card-header-title">
                <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i> Ganti Password
            </div>
        </div>
        <div class="card-body">
            <form action="{{ url('a/ganti-password') }}" method="POST">
                <div class="form-group">
                    <label for="">Password Baru</label>
                    <input type="password" name="password" class="form-control col-sm-4">  
                    @if($errors->has('password'))
                        <p class="text-danger">{{ $errors->first('password') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" class="form-control col-sm-4">  
                    @if($errors->has('password_confirmation'))
                        <p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <input type="submit" value='Update' class="btn btn-primary">
                </div>
                @csrf
                @method('PUT')
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/swal.js') }}"></script>
    @if(session('success'))
        <script>
            Swal.fire(
                'Sukses',
                `{!! session('success') !!}`,
                'success'
            );
        </script>
    @endif
@endsection