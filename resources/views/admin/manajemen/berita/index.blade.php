@extends('admin.master')

@section('title', 'Sunodia ~ Berita')

@section('content')
    <div class="mb-3 card">
        <div class="card-header-tab card-header-tab-animation card-header d-flex justify-content-between">
            <div class="card-header-title">
                <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i> Berita
            </div>
            <div class="d-flex">
                <a href="{{ isset($tingkat) ? url('a/'.$tingkat.'/berita/tambah') : url('a/berita/tambah') }}" class="my-3 btn btn-primary ml-auto">Tambah Berita</a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Tanggal Upload</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($berita as $key => $b)
                        <tr>
                            <td>{{ ($berita->currentpage()-1) * $berita->perpage() + $key + 1 }}</td>
                            <td>{{ $b->judul }}</td>
                            <td>05 Januari 2019</td>
                            <td>
                                <a href="{{ isset($tingkat) ? url('a/'.$b->tingkat.'/berita/'.$b->id.'/edit') : url('a/berita/'.$b->id.'/edit') }}" class="c-blue-500">
                                    <i class="pe-7s-pen"></i>
                                </a>
                                <a href="#delete" class="c-red-500 delete" data-id={{ $b->id }}>
                                    <i class="pe-7s-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $berita->links() }}
            </div>
            <form action="" id="delete-form" style="display: none" method="POST">
                <input type="text" id="id" name="id">
                @csrf
                @method('DELETE')
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
    <script>
        $('.delete').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            Swal.fire({
                    title: 'Anda yakin ingin menghapus?',
                    text: "Anda tidak dapat membatalkan ini.",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Tetap Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.value) {
                        $('#delete-form').attr('action', `{!! url()->current() !!}/${id}`);
                        $('#delete-form').submit();
                    }
            });
        });
    </script>
@endsection