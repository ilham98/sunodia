@extends('admin.master')

@section('title', 'Sunodia ~ Konfigurasi')

@section('content')
    <div class="mb-3 card">
        <div class="card-header-tab card-header-tab-animation card-header">
            <div class="card-header-title">
                <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i> Konfigurasi
            </div>
        </div>
        <div class="card-body">
            <form action="{{ url('a/konfigurasi') }}" method="POST">
                <div class="form-group">
                    <label for="">Tahun Pembelajaran</label>
                    <input type="text" name="tahun_pembelajaran" class="form-control col-sm-1 text-center" value="{{ old('tahun_pembelajaran') ? old('tahun_pembelajaran') : $konfigurasi->tahun_pembelajaran }}">  
                </div>
                <div class="form-group">
                    <label for="">Registrasi Siswa</label>
                    <select name="registrasi_open" id="" class="form-control col-sm-2">
                        <option value="0" {{ (old('registrasi_open') ? old('registrasi_open') : $konfigurasi->registrasi_open) == '0' ? 'selected' : '' }}>Tertutup</option>
                        <option value="1" {{ (old('registrasi_open') ? old('registrasi_open') : $konfigurasi->registrasi_open) == '1' ? 'selected' : '' }}>Terbuka</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value='Update Konfigurasi' class="btn btn-primary">
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