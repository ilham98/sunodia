@extends('admin.master')

@section('title', 'Sunodia ~ Galeri')

@section('content')
    @component('admin.components.content')
        @slot('title', 'Dashboard')
        <div>
            <div class="my-3 d-flex justify-content-end">
                <a href="{{ url('a/galeri/tambah') }}" class="btn btn-primary">Tambah Album</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($album as $key => $a)
                        <tr>
                            <td>{{ ($album->currentpage()-1) * $album->perpage() + $key + 1 }}</td>
                            <td>{{ $a->nama }}</td>
                            <td><a href="{{ url('/a/galeri/'.$a->id) }}"><i class="fas fa-edit"></i></a>
                            <a href="{{ url('/a/galeri/'.$a->id) }}" class="btn-delete" data-id='{{ $a->id }}'><i class="fas fa-trash text-danger"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="my-3 d-flex justify-content-center">
                {{ $album->links() }}
            </div>
        </div>
    @endcomponent
    <form method="POST" id="form">
        @csrf
        @method('DELETE')
    </form>
@endsection

@section('js')
    <script>
        $('.btn-delete').click(function(e) {
            e.preventDefault();
            $('#form').attr('action', '/a/galeri/'+$(this).data('id'));
            $('#form').submit();
        });
    </script>
@endsection