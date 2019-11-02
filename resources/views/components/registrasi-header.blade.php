<link href="https://fonts.googleapis.com/css?family=Neuton:700&display=swap" rel="stylesheet"> 
<style>
.registrasi-siswa-header {
    margin: 0;
    width: 100%;
    font-family: 'Neuton', serif;
    color: #fff;
    background: linear-gradient(-45deg, #01579b, #0d47a1, #e65100, #ffb74d);
    background-size: 400% 400%;
    animation: gradientBG 60s ease infinite;
    border-bottom: 2px solid white;
}

/* .registrasi-siswa-header-text {
    color: linear-gradient(-45deg, #ff9800, #ffe0b2, #64b5f6, #0d47a1);
    animation: gradientBG 15s ease infinite;
} */

@keyframes gradientBG {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}

</style>


<div class="registrasi-siswa-header background" style="height: 150px; display: flex; justify-content: center; align-items: center; ">
    <div class="text-center">
        <div style="font-size: 25px" class="registrasi-siswa-header-text">Pendaftaran Peserta Didik Baru <br> Tahun Pembelajaran  {{ \App\Konfigurasi::first()->tahun_pembelajaran }}/{{ \App\Konfigurasi::first()->tahun_pembelajaran + 1 }} Telah Dibuka</div>
        <a href="/registrasi" class="btn btn-daftar mt-2"> Registrasi</a>
    </div>
</div>