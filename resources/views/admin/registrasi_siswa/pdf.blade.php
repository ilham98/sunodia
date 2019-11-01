<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td, table th {
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</head>
<body>
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
    <div>
        <div style="margin: 10px">
            <h3>Rekap Pendaftaran Siswa Baru Sunodia</h3>
        </div>
        <div style="margin: 10px">
            @if($dari_tanggal || $hingga_tanggal)
                @if($dari_tanggal == $hingga_tanggal)
                    Tanggal {{ $dari_tanggal }}
                @elseif($dari_tanggal && !$hingga_tanggal)
                    Tanggal {{ $dari_tanggal }} - Sekarang
                @elseif($hingga_tanggal && !$dari_tanggal)
                    Dari Awal - {{ $hingga_tanggal }}
                @else
                    Tanggal {{ $dari_tanggal }} - {{ $hingga_tanggal }}
                @endif
            @endif
        </div>
        @if($jenjang)
            <div style="margin: 10px">Jenjang {{ $jenjang }}</div>
        @endif
        @if($tahun_pembelajaran)
            <div style="margin: 10px">Tahun Pembelajaran {{ $tahun_pembelajaran }}/{{ $tahun_pembelajaran+1 }}</div>
        @endif
    </div>
    
    <table>
        <thead>
            <tr>
                <th>No. </th>
                <th>Nomor Registrasi</th>
                <th>Jenjang Yg Diinginkan</th>
                <th>Nama Siswa</th>
                <th>Asal Sekolah</th>
                <th>Nomor Telepon</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reg as $i => $r)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $r->nomor_registrasi }}</td>
                    <td>{{ getNamaTingkat($r->tingkat) }}</td>
                    <td>{{ $r->nama }}</td>
                    <td>{{ $r->asal_sekolah }}</td>
                    <td>{{ $r->no_hp_calon_siswa }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>