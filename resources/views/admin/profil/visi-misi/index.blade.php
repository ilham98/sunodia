@extends('admin.master')

@section('title', 'Sunodia ~ Visi & Misi')

@section('css')
    <link href="{{ asset('css/quill.css') }}" rel="stylesheet">
@endsection

@section('content')
    @component('admin.components.content')
        @slot('title', 'Visi & Misi')
        <h6>Visi</h6>
        <div id="editor">
            {!! $profil->visi !!}
        </div>
        @if($errors->has('visi'))
            <p class="text-danger">{{$errors->first('visi') }}</p>
        @endif
        <h6 class="mt-3">Misi</h6>
        <div id="editor2">
            {!! $profil->misi !!}
        </div>
        @if($errors->has('misi'))
            <p class="text-danger">{{$errors->first('misi') }}</p>
        @endif
        <input type="button" value="Simpan" id="btn-save" class="btn btn-primary mt-2">
    @endcomponent
    <form action="{{ url('a/visi-misi') }}" id="form" method="POST" hidden>
        <textarea name="visi" id="visi" id="" cols="30" rows="10"></textarea>
        <textarea name="misi" id="misi" id="" cols="30" rows="10"></textarea>
        @csrf
        @method('PUT')
    </form>
@endsection

@section('js')
    <script src="{{ asset('js/quill.js') }}"></script>
    <script>
        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            ['blockquote', 'code-block'],

            [{ 'header': 1 }, { 'header': 2 }],               // custom button values
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
            [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
            [{ 'direction': 'rtl' }],                         // text direction

            [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

            [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
            [{ 'font': [] }],
            [{ 'align': [] }],

            ['clean']                                         // remove formatting button
        ];

        const editor = new Quill('#editor', {
            bounds: '#editor',
            modules: {
                toolbar: toolbarOptions,
            },
            placeholder: 'Free Write...',
            theme: 'snow'
        });

        const editor2 = new Quill('#editor2', {
            bounds: '#editor2',
            modules: {
                toolbar: toolbarOptions,
            },
            placeholder: 'Free Write...',
            theme: 'snow'
        });

        $('#btn-save').click(function() {
            $('#visi').val(editor.container.firstChild.innerHTML);
            $('#misi').val(editor2.container.firstChild.innerHTML);
            $('#form').submit();
        });
    </script>
    @if(session()->has('success'))
        <script>
            setTimeout(function() {
                Swal.fire({
                    title: 'Sukses!',
                    text: `{!! session('success') !!}`,
                    type: 'success'
                });
            }, 1000); 
        </script>
    @endif
@endsection