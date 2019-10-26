@extends('admin.master')

@section('title', 'Sunodia ~ Edit Berita')

@section('css')
    <link href="{{ asset('css/quill.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="mb-3 card" style="height: 800px">
        <div class="card-header-tab card-header-tab-animation card-header">
            <div class="card-header-title">
                <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i> Berita
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Judul</label>
                <input type="text" value="{{ old('title') ? old('title') : $berita->judul  }}" class="form-control" id="title-show">
                @if($errors->has('title'))
                    <p class="text-danger">{{$errors->first('title') }}</p>
                @endif
            </div>
            <div id="editor" style="height: 500px">
                {!! $berita->isi !!}
            </div>
            @if($errors->has('body'))
                <p class="text-danger">{{$errors->first('body') }}</p>
            @endif
            <div class="d-flex justify-content-end">
                <input type="button" value="Simpan" id="btn-save" class="btn btn-primary mt-2">
            </div>
        </div>
    </div>
    <form action="{{ isset($tingkat) ? url('a/'.$tingkat.'/berita/'.$berita->id) : url('a/berita/'.$berita->id) }}" id="form" method="POST" hidden>
        <textarea name="body" id="body" id="" cols="30" rows="10"></textarea>
        <input type="text" id="title" name="title">
        @csrf
        @method('PUT')
    </form>
@endsection

@section('js')
    <script src="{{ asset('js/quill.js') }}"></script>
    <script>
        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            ['blockquote', 'code-block', 'image', 'video'],

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
                imageResize: {
                    displaySize: true
                }
            },
            placeholder: 'Free Write...',
            theme: 'snow'
        });

        $('#btn-save').click(function() {
            $('#body').val(editor.container.firstChild.innerHTML);
            $('#title').val($('#title-show').val());
            $('#form').submit();
        });


        function selectLocalImage() {
            const input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.click();

            // Listen upload local image and save to server
            input.onchange = () => {
                const file = input.files[0];

                // file type is only image.
                if (/^image\//.test(file.type)) {
                saveToServer(file);
                } else {
                console.warn('You could only upload images.');
                }
            };
        }

        function saveToServer(file) {
            const fd = new FormData();
            fd.append('image', file);
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '/api/file/upload', true);
            xhr.onload = () => {
                if (xhr.status === 200) {
                // this is callback data: url
                //   const url = JSON.parse(xhr.responseText).data;
                insertToEditor(xhr.responseText);
                }
            };
            xhr.send(fd);
        }

        function insertToEditor(url) {
            const range = editor.getSelection();
            editor.insertEmbed(range.index, 'image', `${url}`);
        }

        editor.getModule('toolbar').addHandler('image', () => {
        selectLocalImage();
        });
    </script>
@endsection