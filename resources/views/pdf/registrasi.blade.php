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

        .table-form {
            width: 100%;
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

        .bold {
            font-weight: bold;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    {{-- ---------------------------------------------------- COVER -------------------------------------------------- --}}
    @include('pdf.registrasi-header')
    
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
            <div class="cover-detail">Jl. Kartini No. 112A</div>
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
    @include('pdf.registrasi-header')
    
    @php
        $index = 97;
    @endphp
    <div class="bold">I. Data Calon Siswa</div>
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
            <td>{{ date('d-m-Y', strtotime($reg->tanggal_lahir)) }}</td>
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
            <td>{{ $reg->email_calon_siswa ? $reg->email_calon_siswa : '-' }}</td>
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
    @if(count($reg->saudara) > 0)
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
    @endif
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
    <div class="page_break"></div>
    {{-- -------------------------------------------------- Page 1 End -------------------------------------------------- --}}
    @include('pdf.registrasi-header')
    
    <div class="bold">II. Keterangan Pendidikan Sebelumnya</div>
    <table class="table-form">
        <tr>
            <td>a.</td>
            <td>Asal Sekolah</td>
            <td>:</td>
            <td>{{ $reg->asal_sekolah ? $reg->asal_sekolah : '-' }}</td>
        </tr>
        <tr>
            <td>b.</td>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $reg->alamat ? $reg->alamat : '-' }}</td>
        </tr>
        <tr>
            <td>c.</td>
            <td>Nomor Ijazah</td>
            <td>:</td>
            <td>{{ $reg->nomor_ijazah ? $reg->nomor_ijazah : '-' }}</td>
        </tr>
        <tr>
            <td>d.</td>
            <td>Lama Belajar</td>
            <td>:</td>
            <td>{{ $reg->lama_belajar ? $reg->lama_belajar : '-' }}</td>
        </tr>
        <tr>
            <td>e.</td>
            <td>Jumlah Nilai</td>
            <td>:</td>
            <td>{{ $reg->jumlah_nilai ? $reg->jumlah_nilai : '-' }}</td>
        </tr>
    </table>
    <div class="bold">III. Keterangan Kesehatan</div>
    <table class="table-form">
        <tr>
            <td>a.</td>
            <td>Golongan darah</td>
            <td>:</td>
            <td>{{ $reg->golongan_darah }}{{ $reg->rhesus == 'Positif' ? '+' : '-' }}</td>
        </tr>
        <tr>
            <td>b.</td>
            <td>Penyakit yang pernah diderita</td>
            <td>:</td>
            <td>{{ $reg->penyakit_yang_pernah_diderita ? $reg->penyakit_yang_pernah_diderita : '-' }}</td>
        </tr>
        <tr>
            <td>c.</td>
            <td>Berkebutuhan khusus</td>
            <td>:</td>
            <td>{{ $reg->berkebutuhan_khusus }}</td>
        </tr>
        <tr>
            <td>d.</td>
            <td>Tinggi badan</td>
            <td>:</td>
            <td>{{ $reg->tinggi_badan }} cm</td>
        </tr>
        <tr>
            <td>e.</td>
            <td>Berat badan</td>
            <td>:</td>
            <td>{{ $reg->berat_badan }} kg</td>
        </tr>
        <tr>
            <td>f.</td>
            <td>Ciri khusus lainnya</td>
            <td>:</td>
            <td>{{ $reg->ciri_khusus_lainnya ? $reg->ciri_khusus_lainnya : '-' }}</td>
        </tr>
    </table>
    <div class="bold">IV. Keterangan Kegemaran / Hobby dan Prestasi</div>
    <div>Kegemaran : @if($kegemaran->count() == 0) Tidak ada kegemaran yang ditambahkan @endif</div>
    <ol style="margin: 3px">
        @foreach($kegemaran as $k) 
            <li>{{ $k->nama }} ({{ $k->jenis }})</li>
        @endforeach
    </ol>
    <div>Prestasi : @if($prestasi->count() == 0) Tidak ada prestasi yang ditambahkan @endif</div>
    <ol style="margin: 3px">
        @foreach($prestasi as $p) 
            <li>{{ $p->nama }} ({{ $p->jenis }})</li>
        @endforeach
    </ol>
    <div class="page_break"></div>
    {{-- -------------------------------------------------- Page 1 End -------------------------------------------------- --}}
    @include('pdf.registrasi-header')
    
    <div class="bold">V. Keterangan Orang tua / Wali siswa</div>
    @if($reg->tinggal_bersama == 'orang_tua')
        <div style='margin: 5px 0; font-weight: bold'>Ayah</div>
        <table class="table-form" style="width: 100%">
            <tr>
                <td>a.</td>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td>{{ $ayah->nama }}</td>
            </tr>
            <tr>
                <td>b.</td>
                <td>Tempat Lahir</td>
                <td>:</td>
                <td>{{ date('d-m-Y', strtotime($ayah->tanggal_lahir)) }}</td>
            </tr>
            <tr>
                <td>c.</td>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td>{{ $ayah->tanggal_lahir }}</td>
            </tr>
            <tr>
                <td>d.</td>
                <td>Agama</td>
                <td>:</td>
                <td>{{ $ayah->agama }}</td>
            </tr>
            <tr>
                <td>e.</td>
                <td>Kewarganegaraan</td>
                <td>:</td>
                <td>{{ $ayah->kewarganegaraan }}</td>
            </tr>
            <tr>
                <td>f.</td>
                <td>Pendidikan Terakhir</td>
                <td>:</td>
                <td>{{ $ayah->pendidikan_terakhir }}</td>
            </tr>
            <tr>
                <td>g.</td>
                <td>Pekerjaan / Jabatan</td>
                <td>:</td>
                <td>{{ $ayah->pekerjaan_jabatan }}</td>
            </tr>
            <tr>
                <td>h.</td>
                <td>Alamat Lengkap</td>
                <td>:</td>
                <td>{{ $ayah->alamat_lengkap }}</td>
            </tr>
            <tr>
                <td>i.</td>
                <td>Nomor telepon / HP</td>
                <td>:</td>
                <td>{{ $ayah->no_telepon }}</td>
            </tr>
            <tr>
                <td>j.</td>
                <td>Keterangan</td>
                <td>:</td>
                <td>{{ $ayah->keterangan }}</td>
            </tr>
            <tr>
                <td>k.</td>
                <td>Penghasilan Perbulan</td>
                <td>:</td>
                <td>{{ $penghasilan_ayah }}</td>
            </tr>
        </table>
        <div style='margin: 5px 0; font-weight: bold'>Ibu</div>
        <table class="table-form" style="width: 100%">
            <tr>
                <td>a.</td>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td>{{ $ibu->nama }}</td>
            </tr>
            <tr>
                <td>b.</td>
                <td>Tempat Lahir</td>
                <td>:</td>
                <td>{{ $ibu->tempat_lahir }}</td>
            </tr>
            <tr>
                <td>c.</td>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td>{{ date('d-m-Y', strtotime($ibu->tanggal_lahir)) }}</td>
            </tr>
            <tr>
                <td>d.</td>
                <td>Agama</td>
                <td>:</td>
                <td>{{ $ibu->agama }}</td>
            </tr>
            <tr>
                <td>e.</td>
                <td>Kewarganegaraan</td>
                <td>:</td>
                <td>{{ $ibu->kewarganegaraan }}</td>
            </tr>
            <tr>
                <td>f.</td>
                <td>Pendidikan Terakhir</td>
                <td>:</td>
                <td>{{ $ibu->pendidikan_terakhir }}</td>
            </tr>
            <tr>
                <td>g.</td>
                <td>Pekerjaan / Jabatan</td>
                <td>:</td>
                <td>{{ $ibu->pekerjaan_jabatan }}</td>
            </tr>
            <tr>
                <td>h.</td>
                <td>Alamat Lengkap</td>
                <td>:</td>
                <td>{{ $ibu->alamat_lengkap }}</td>
            </tr>
            <tr>
                <td>i.</td>
                <td>Nomor telepon / HP</td>
                <td>:</td>
                <td>{{ $ibu->no_telepon }}</td>
            </tr>
            <tr>
                <td>j.</td>
                <td>Keterangan</td>
                <td>:</td>
                <td>{{ $ibu->keterangan }}</td>
            </tr>
            <tr>
                <td>k.</td>
                <td>Penghasilan Perbulan</td>
                <td>:</td>
                <td>{{ $penghasilan_ibu }}</td>
            </tr>
        </table>
    @else
    <div style='margin: 5px 0; font-weight: bold'>Wali</div>
    <table class="table-form" style="width: 100%">
        <tr>
            <td>a.</td>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td>{{ $wali->nama }}</td>
        </tr>
        <tr>
            <td>b.</td>
            <td>Tempat Lahir</td>
            <td>:</td>
            <td>{{ $wali->tempat_lahir }}</td>
        </tr>
        <tr>
            <td>c.</td>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td>{{ date('d-m-Y', strtotime($wali->tanggal_lahir)) }}</td>
        </tr>
        <tr>
            <td>d.</td>
            <td>Agama</td>
            <td>:</td>
            <td>{{ $wali->agama }}</td>
        </tr>
        <tr>
            <td>e.</td>
            <td>Kewarganegaraan</td>
            <td>:</td>
            <td>{{ $wali->kewarganegaraan }}</td>
        </tr>
        <tr>
            <td>f.</td>
            <td>Pendidikan Terakhir</td>
            <td>:</td>
            <td>{{ $wali->pendidikan_terakhir }}</td>
        </tr>
        <tr>
            <td>g.</td>
            <td>Pekerjaan / Jabatan</td>
            <td>:</td>
            <td>{{ $wali->pekerjaan_jabatan }}</td>
        </tr>
        <tr>
            <td>h.</td>
            <td>Alamat Lengkap</td>
            <td>:</td>
            <td>{{ $wali->alamat_lengkap }}</td>
        </tr>
        <tr>
            <td>i.</td>
            <td>Nomor telepon / HP</td>
            <td>:</td>
            <td>{{ $wali->no_telepon }}</td>
        </tr>
        <tr>
            <td>j.</td>
            <td>Keterangan</td>
            <td>:</td>
            <td>{{ $wali->keterangan }}</td>
        </tr>
        <tr>
            <td>k.</td>
            <td>Penghasilan Perbulan</td>
            <td>:</td>
            <td>{{ $penghasilan_wali }}</td>
        </tr>
    </table>
    @endif
    <div style="position: absolute; width: 200px; text-align: center; right: 50px; bottom: 0px; height: 151px">
        <img src="{{ $foto_siswa }}" style="height: 100%;" alt="">
        <div>Ilham</div>  
    </div>
</body>
</html>