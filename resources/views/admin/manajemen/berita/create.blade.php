@extends('admin.master')

@section('title', 'Sunodia ~ Tambah Berita')

@section('css')
    <link href="{{ asset('css/quill.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/swal.css') }}">
@endsection

@section('content')
    @component('admin.components.content')
        @slot('title', 'Berita')
        <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control" id="title-show" value="{{ old('title') }}">
            @if($errors->has('title'))
                <p class="text-danger">{{$errors->first('title') }}</p>
            @endif
        </div>
        <div id="editor">
            @if(old('body'))
                {!! old('body') !!}
            @else
                <p>Hello World!</p>
                <p>Some initial <strong>bold</strong> text</p>
                <p><br></p>
            @endif
        </div>
        @if($errors->has('body'))
            <p class="text-danger">{{$errors->first('body') }}</p>
        @endif
        <input type="button" value="Simpan" id="btn-save" class="btn btn-primary mt-2">
    @endcomponent
    <form action="{{ url('a/'.$tingkat.'/berita') }}" id="form" method="POST" hidden>
        <textarea name="body" id="body" id="" cols="30" rows="10"></textarea>
        <input type="text" id="title" name="title">
        @csrf
        @method('POST')
    </form>
@endsection

@section('js')
    <script src="{{ asset('js/quill.js') }}"></script>
    <script src="{{ asset('js/swal.js') }}"> </script>
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
                    Swal.fire(
                        'Error',
                        'Anda hanya dapat mengupload gambar',
                        'error'
                    );
                }
            };
        }

        function saveToServer(file) {
            Swal.fire({
                title: "Uploading Image",
                text: "Please wait",
                showConfirmButton: false,
                allowOutsideClick: false
            });
            const fn = new FormData();
            fn.append('file', file);
            
            $.ajax({
                url: `{!! url('/api/upload') !!}`,
                data: fn,
                processData: false,
                method: 'POST',
                contentType: false,
                success: function(res)  {
                    insertToEditor(res.url);
                    Swal.close()
                },
                error: function(err) {
                    Swal.fire(
                        'Error',
                        'Terjadi kesalahan saat upload file',
                        'error'
                    );
                }
            });

            // const xhr = new XMLHttpRequest();
            // xhr.open('POST', '/api/file/upload', true);
            // xhr.onload = () => {
            //     if (xhr.status === 200) {
            //     // this is callback data: url
            //     //   const url = JSON.parse(xhr.responseText).data;
            //     insertToEditor(xhr.responseText);
            //     Swal.close()
            //     }
            // };
            // xhr.send(fd);
        }

        function insertToEditor(url) {
            const range = editor.getSelection();
            editor.insertEmbed(range.index, 'image', `${url}`);
        }

        editor.getModule('toolbar').addHandler('image', () => {
            selectLocalImage();
        });

        editor.on('text-change', (delta, oldContents, source) => {
            // console.log(delta, oldContents, source)
            if (source !== 'user') return;

            // const inserted = getImgUrls(delta);
            const deleted = getImgUrls(editor.getContents().diff(oldContents))[0];
            if(deleted) {
                $.ajax({
                    url: `{!! url('/api/upload') !!}?url=${deleted}`,
                    method: 'DELETE',
                    data: { url: deleted },
                    success: function(res)  {
                        console.log('success')
                    },
                    error: function(err) {
                        console.log('error')
                    }
                });
            }
        });
        function getImgUrls(delta) {
            return delta.ops.filter(i => i.insert && i.insert.image).map(i => i.insert.image);
        }
    </script>
@endsection