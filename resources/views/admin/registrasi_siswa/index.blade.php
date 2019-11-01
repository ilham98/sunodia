@extends('admin.master')

@section('title', 'Sunodia ~ Registrasi Siswa')

@php
    function getNamaTingkat($tingkat) {
        switch($tingkat) {
            case 1:
                return 'KB Kecil';
            case 2:
                return 'KB Besar';
            case 3:
                return 'TK A';
            case 4:
                return 'TK B';
            case 5:
                return 'SD';
            case 6:
                return 'SMP';
            case 7:
                return 'SMA';
        }
    }    
@endphp

@section('content')
    <div class="mb-3 card">
        <div class="card-header-tab card-header-tab-animation card-header">
            <div class="card-header-title">
                <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i> Registrasi Siswa
            </div>
        </div>
        <form class="p-3" id="form">
            <div style="font-weight: bold" class="mb-2">Filter</div>
            <div class="row">
                <div class="form-group col-sm-4">
                    <label for="">Tahun</label>
                    <select name="tahun_pembelajaran" class="form-control" id="">
                        <option value="">Semua</option>
                        @foreach($tahun_pembelajaran as $t)
                            <option {{ $request->tahun_pembelajaran == $t ? 'selected' : '' }} value="{{ $t }}">{{ $t }}/{{ $t+1 }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label for="">Jenjang</label>
                    <select name="jenjang" class="form-control" id="">
                        <option value="">Semua</option>
                        <option value="1" {{ $request->jenjang == '1' ? 'selected' : '' }}>KB Kecil</option>
                        <option value="2" {{ $request->jenjang == '2' ? 'selected' : '' }}>KB Besar</option>
                        <option value="3" {{ $request->jenjang == '3' ? 'selected' : '' }}>TK A</option>
                        <option value="4" {{ $request->jenjang == '4' ? 'selected' : '' }}>TK B</option>
                        <option value="5" {{ $request->jenjang == '5' ? 'selected' : '' }}>SD</option>
                        <option value="6" {{ $request->jenjang == '6' ? 'selected' : '' }}>SMP</option>
                        <option value="7" {{ $request->jenjang == '7' ? 'selected' : '' }}>SMA</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-4">
                    <label for="">Dari Tanggal</label>
                    <input type="date" class="form-control" value="{{ $request->dari_tanggal }}" name="dari_tanggal">
                </div>
                <div class="form-group col-sm-4">
                    <label for="">Hingga Tanggal</label>
                    <input type="date" class="form-control" value="{{ $request->hingga_tanggal }}"  name="hingga_tanggal">
                </div>
            </div>
            <input type="submit" name="input" value="Filter" class="btn btn-primary">
            <input type="submit" name="input" data-type='pdf' value="Download PDF" class="btn btn-primary">
        </form>
        <div class="card-body p-0">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nomor Registrasi</th>
                        <th>Nama</th>
                        <th>Jenjang Yang Diinginkan</th>
                        <th>Tahun Pembelajaran</th>
                        <th>Tanggal Registrasi</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reg as $r)
                        <tr>
                            <td>{{ $r->nomor_registrasi }}</td>
                            <td>{{ $r->nama }}</td>
                            <td>{{ getNamaTingkat($r->tingkat) }}</td>
                            <td>{{ $r->tahun_pembelajaran }}/{{ $r->tahun_pembelajaran+1 }}</td>
                            <td>{{ date('d-m-Y', strtotime($r->saved_date)) }}</td>
                            <td><a href="{{ url('a/registrasi-siswa/'.$r->id) }}"><i class="pe-7s-pen"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center my-2">
                {{ $reg->appends(request()->input())->links() }}
            </div>
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