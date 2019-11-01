<link href="https://fonts.googleapis.com/css?family=Neuton:700&display=swap" rel="stylesheet"> 

<div class="registrasi-siswa-header background" style="height: 150px; display: flex; justify-content: center; align-items: center; ">
    <div class="text-center">
        <div style="font-size: 25px" class="registrasi-siswa-header-text">Pendaftaran Peserta Didik Baru <br> Tahun Pembelajaran  {{ \App\Konfigurasi::first()->tahun_pembelajaran }}/{{ \App\Konfigurasi::first()->tahun_pembelajaran + 1 }} Telah Dibuka</div>
        <a href="/registrasi" class="btn btn-daftar mt-2"> Registrasi</a>
    </div>
</div>