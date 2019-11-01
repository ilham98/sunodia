@extends('master')

@section('title', 'Registrasi ~ Surat Pernyataan')

@section('css')
    <style>
        body {
            background: #1e88e5;   
        }

        .register-box {
            box-shadow: 0px 0px 8px 2px rgba(9,101,181,1);
        }

        h5 {
            padding: 10px 20px;
            background: #fff31c;
        }

        .tingkat {
            background: #ff8921;
            color: white;
            border-radius: 15px;
            display: inline-block;
            padding: 5px 20px;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .pilihan-tingkat {
            justify-content: center;
        }

        label {
            color: #707070;
        }

        ol {
            padding-left: 14px;
        }

        ol li {
            padding: 0px;
            margin: 10px 0px;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/swal.css') }}">
@endsection

@section('content')
    <div class="container p-0 bg-white register-box mt-3">
        <h5 class="m-0"><img height='40' src="https://img.icons8.com/dotty/80/000000/note.png"> Registrasi - Surat Pernyataan</h5>
        @include('registrasi.sesi-button')
            <form class="p-3">
                <div>Dengan ini menyatakan bahwa diterimanya anak kami di Sekolah Kristen Sunodia sebagai yang berciri khas Kristiani, maka:</div>
                <ol>
                    <li>Kami bersedia menerima dan mengikuti segala peraturan yang berlaku di Sekolah dan ketentuan mengenai pakaian seragam sekolah serta semua program pendidikan termasuk mengikuti pendidikan / pelajaran Agama Kristen di Sekolah Kristen Sunodia.</li>
                    <li>Bersedia membayar Uang Masuk Wajib (UMW) yang ditetapkan.</li>
                    <li>Menerima ketentuan mengenai uang sekolah dan uang kegiatan yang akan ditetapkan, kamipun menyetujui kenaikan uang sekolah yang dengan sendirinya diperlukan dalam rangka penyesuaian dan atau peningkatkan pelayanan pendidikan di Sekolah Kristen Sunodia.</li>
                    <li>Apabila saya tidak atau terlambat memenuhi batas waktu yang telah ditentukan dalam Prosedur Penerimaan Siswa Baru maka saya setuju pendaftaran ini menjadi gugur.</li>
                    <li>Apabila saya membatalkan pendaftaran dengan alasan apapun maka separuh (50%) uang yang telah dibayar akan dikembalikan.</li>
                    <li>Kami bersedia datang ke sekolah bila diperlukan untuk membina kerja sama yang baik karena kami menyadari bahwa keberhasilan pendidikan anak kami merupakan tanggung jawab kami bersama pihak sekolah.</li>
                    <li>Bersedia menerima sanksi yang diberikan sekolah apabila anak kami melakukan pelanggaran tata tertib sekolah, terlibat dalam penggunaan narkoba dan melakukan tindakan kriminalitas.</li>
                    <li>Bersedia menerima pemeriksaan / test narkoba yang dilakukan Sekolah kepada anak kami ketika ia sudah masuk Sekolah Kristen Sunodia. Bila dari pemerikasaan itu ternyata anak kami terlibat narkoba, kami bersedia menarik anak kami dari Sekolah tanpa menuntut apapun kepada Sekolah Kristen Sunodia.</li>
                    <li>Jika di kemudian hari didapatkan bahwa dokumen-dokumen dan atau informasi yang saya berikan tidak benar, maka saya menyetujui pembatalan penerimaan anak kami tersebut atau dikeluarkan jika telah bersekolah di Sekolah Kristen Sundodia oleh Yayasan Pendidikan Kristen Sunodia secara sepihak.</li>
                </ol>
            </form>
            <form action="{{ url('registrasi/8') }}" class="p-3" method="POST" enctype="multipart/form-data">
                <div class="mt-5 d-flex justify-content-end">
                    <a href="{{ url('registrasi?goto=prev') }}" class="btn btn-info">Kembali</a>
                    <input type="submit" class="ml-2 btn btn-warning" value="Terima Syarat & Ketentuan">
                </div>
                @csrf
                @method('POST')
            </form>
    </div>
    @include('registrasi.sesi')
@endsection

@section('js')
    <script src="{{ asset('/js/swal.js') }}"></script>
    @if(session('error'))
        <script>
            Swal.fire(
                'Error',
                `{!! session('error') !!}`, 
                'error'
            );
        </script>
    @endif
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover()
        })
    </script>
@endsection