<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        h1, h2 {
            margin: 0px;
            margin-top: 10px;
        }

        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        .cover-nama-sekolah {
            font-size: 30px;
            font-weight: bold;
        }

        .cover-detail {
            font-size: 15px;
            font-weight: bold;
        }

        .cover-footer {
            text-align: center;
            font-weight: bold;
        }

        .serif {
            font-family: "Times New Roman", Times, serif;
            
        }

        .page_break { page-break-before: always; }

        table {
     
        }

        table td {
           padding: 5px;
           margin: 0px;
           vertical-align: top
        }

        .table-form tr td:nth-child(1) {
            width: 3%;
        }

        .table-form tr td:nth-child(2) {
            width: 30%;
        }
        .table-form tr td:nth-child(3) {
            width: 2%;
        }
    </style>
</head>
<body>
    {{-- ---------------------------------------------------- COVER -------------------------------------------------- --}}
    @component('pdf.registrasi-header')
    @endcomponent
    <div>
        <div style="text-align: center">
            <h1 style="text-decoration: underline">FORMULIR PENDAFTARAN</h1>
            <h2>Tahun Pembelajaran 2019-2020</h2>
            <h1 class="serif" style="font-size: 40px; margin-top: 30px">SEKOLAH KRISTEN SUNODIA</h1>
        </div>
        <div style="text-align: center">
            <img src="img/logo.png" style="" width="400" alt="">
        </div>
    </div>
    <h2 style="text-align: center; margin-bottom: 40px" class="serif">YAYASAN PENDIDIKAN KRISTEN SUNODIA</h2>
    <div style="display: flex; margin-top: 30px">
        <div>
            <div class="cover-nama-sekolah">KB & TK</div>
            <div class="cover-detail">Jl. Mulawarman RT.7 No.20</div>
            <div class="cover-detail">Samarinda 75113</div>
            <div class="cover-detail">Telp. (0541) 4113343</div>
        </div>
        <div style="width: 250px; margin-left: auto">
            <div class="cover-nama-sekolah">SD - SMP - SMA</div>
            <div class="cover-detail">Jl. Karini No. 112A</div>
            <div class="cover-detail">Samarinda 75117</div>
            <div class="cover-detail">Telp. (0541) 7777680</div>
            <div class="cover-detail">Telp. (0541) 7777681</div>
            <div class="cover-detail">Telp. (0541) 7777682</div>
        </div>
    </div>
    <div class="cover-footer">
        <div>Email: sekolah_sunodia@yahoo.co.id</div>
        <div>Website: sunodia.sch.id</div>
    </div>
    <div class="page_break"></div>
    {{-- -------------------------------------------------- PAGE 1 ---------------------- --}}
    @component('pdf.registrasi-header')
    @endcomponent
    @php
        $index = 97;
    @endphp
    <table class="table-form">
        <tr>
            <td>{{ chr($index) }}.</td>
            <td>Jenjang pendidikan yang dipilih</td>
            <td>:</td>
            <td>{{ $tingkat }}</td>
        </tr>
        @php
            $index++;
        @endphp
        <tr>
            <td>{{ chr($index) }}.</td>
            <td>Nama</td>
            <td>:</td>
            <td>{{ $reg->nama }}</td>
        </tr>
        @php
            $index++;
        @endphp
        <tr>
            <td>{{ chr($index) }}.</td>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $reg->jenis_kelamin }}</td>
        </tr>
        @php
            $index++;
        @endphp
        <tr>
            <td>{{ chr($index) }}.</td>
            <td>Tempat Lahir</td>
            <td>:</td>
            <td>{{ $reg->tempat_lahir }}</td>
        </tr>
        @php
            $index++;
        @endphp
        <tr>
            <td>{{ chr($index) }}.</td>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td>{{ $reg->tanggal_lahir }}</td>
        </tr>
        @php
            $index++;
        @endphp
        <tr>
            <td>{{ chr($index) }}.</td>
            <td>Agama</td>
            <td>:</td>
            <td>{{ $reg->agama }}</td>
        </tr>
        @php
            $index++;
        @endphp
        @if($reg->agama == 'Kristen' || $reg->agama == 'Katolik')
            <tr>
                <td>{{ chr($index) }}.</td>
                <td>Bergereja di</td>
                <td>:</td>
                <td>{{ $reg->bergereja_di }}</td>
            </tr>
            @php
                $index++;
            @endphp
            <tr>
                <td>{{ chr($index) }}.</td>
                <td>Aktif / Pelayan sebagai</td>
                <td>:</td>
                <td>{{ $reg->aktif_pelayan }}</td>
            </tr>
            @php
                $index++;
            @endphp
        @endif
        <tr>
            <td>{{ chr($index) }}.</td>
            <td>Kewarganegaraan</td>
            <td>:</td>
            <td>{{ $reg->kewarganegaraan }}</td>
            @php
                $index++;
            @endphp
        </tr>
        <tr>
            <td>{{ chr($index) }}.</td>
            <td>Alamat Rumah</td>
            <td>:</td>
            <td>{{ $reg->alamat_rumah }}</td>
            @php
                $index++;
            @endphp
        </tr>
        <tr>
            <td>{{ chr($index) }}.</td>
            <td>Kode POS</td>
            <td>:</td>
            <td>{{ $reg->kode_pos }}</td>
            @php
                $index++;
            @endphp
        </tr>
        <tr>
            <td>{{ chr($index) }}.</td>
            <td>Telepon</td>
            <td>:</td>
            <td>{{ $reg->telepon }}</td>
            @php
                $index++;
            @endphp
        </tr>
        <tr>
            <td>{{ chr($index) }}.</td>
            <td>Tinggal Dengan</td>
            <td>:</td>
            <td>{{ $reg->tinggal_dengan }}</td>
            @php
                $index++;
            @endphp
        </tr>
        <tr>
            <td>{{ chr($index) }}.</td>
            <td>Nomor HP Calon Siswa</td>
            <td>:</td>
            <td>{{ $reg->no_hp_calon_siswa }}</td>
            @php
                $index++;
            @endphp
        </tr>
        <tr>
            <td>{{ chr($index) }}.</td>
            <td>Alamat E-mail Calon Siswa</td>
            <td>:</td>
            <td>{{ $reg->email_calon_siswa }}</td>
            @php
                $index++;
            @endphp
        </tr>
        <tr>
            <td>{{ chr($index) }}.</td>
            <td>Anak Keberapa dalam keluarga</td>
            <td>:</td>
            <td>{{ $reg->anak_ke }}</td>
            @php
                $index++;
            @endphp
        </tr>
        <tr>
            <td>{{ chr($index) }}.</td>
            <td>Jumlah Saudara Kandung / Angkat</td>
            <td>:</td>
            <td>{{ $reg->jumlah_saudara }}</td>
            @php
                $index++;
            @endphp
        </tr>
    </table>
    <div style="margin-bottom: 5px; margin-left: 8px; margin-top: 5px"><span style="margin-right: 13px">{{ chr($index) }}.</span> Saudara Kandung / angkat yang masih sekolah</div>
    @php
        $index++;
    @endphp
    <table border='1' style="border-collapse: collapse; width: 100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Pendidikan</th>
                <th>Kakak / Adik</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reg->saudara as $i => $s)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $s->saudara_nama }}</td>
                    <td>{{ $s->saudara_umur }}</td>
                    <td>{{ $s->saudara_pendidikan }}</td>
                    <td>{{ $s->saudara_status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <table class="table-form">
        <tr>
            <td>{{ chr($index) }}.</td>
            <td>Jarak tempat tingal ke sekolah</td>
            <td>:</td>
            <td>{{ $reg->jarak_tempuh_sekolah }} KM</td>
        </tr>
        @php
            $index++;
        @endphp
        <tr>
            <td>{{ chr($index) }}.</td>
            <td>Waktu tempuh berangkat ke sekolah</td>
            <td>:</td>
            <td>{{ $reg->waktu_tempuh_sekolah }} Menit</td>
        </tr>
        @php
            $index++;
        @endphp
        <tr>
            <td>{{ chr($index) }}.</td>
            <td>Alat transportasi ke sekolah</td>
            <td>:</td>
            <td>{{ $reg->alat_tempuh_sekolah }}</td>
        </tr>
        @php
            $index++;
        @endphp
    </table>
</body>
</html>