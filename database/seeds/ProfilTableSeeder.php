<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profil')->insert([
            'visi' => '<p>Menjadi Sekolah Kristen yang memiliki Iman, Karakter dan Pengetahuan</p>',
            'misi' => '<p>1. Menjadikan Yesus Kristus sebagai teladan bagi warga sekolah</p><p>2. Membentuk warga sekolah berkarakter Kristus</p><p>3. Menghasilkan sikap disiplin, mandiri dan bertanggung jawab</p><p>4. Mewujudkan pendidikan yang bermutu sesuai dengan tuntutan perkembangan zaman</p><p>5. Menghasilkan siswa-siswi :</p><ul><li>Yang takut dan beriman kepada Tuhan</li><li>Berilmu tinggi dan peduli pada keluarga, lingkungan dan sesama</li><li>Yang menghargai potensi diri dan talenta yang telah dikaruniakan oleh Tuhan, untuk diasah, dipakai dan dikembangkan bagi kemuliaan Tuhan</li></ul>',
            'mars' => '<p>Test Mars</p>',
            'sejarah' => '<p>Keberadaan Sekolah Kristen Sunodia yang terletak di jalan Kartini No. 112A adalah ikut memajukan dunia pendidikan di Samarinda sebagai wadah pembentukan manusia yang beriman dan berprestasi.Sekolah ini bermula dari jenjang TK di jalan Mulawarman No. 20 yang didirikan sejak tahun 1998. Dua tahun kemudian, pada tahun 2000/2001, dilanjutkan dengan membuka jenjang SD di tempat yang sama.</p>',
            'logo' => '<p>Makna Logo:</p><p>BUKU dan PENA EMAS melambangkan pendidikan,</p><p>SALIB melambangkan pendidikan yang diajarkan berlandaskan kekristenan,</p><p>PITA bertulisan SUNODIA melambangkan semua siswa/siswi yang menggali ilmu akan diikat dengan tali kebersamaan,</p><p>PERISAI melambangkan semuanya ini (pendidikan, ajaran, kebersamaan, dll) akan ditopang dengan perisai iman yang kuat.</p>'
        ]);
    }
}
