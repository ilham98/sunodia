<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisDokumenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_dokumen')->insert([
            'nama' => 'Fotocopy Akte Kelahiran Calon Siswa'
        ]);

        DB::table('jenis_dokumen')->insert([
            'nama' => 'Kartu Keluarga'
        ]);

        DB::table('jenis_dokumen')->insert([
            'nama' => 'KTP'
        ]);

        DB::table('jenis_dokumen')->insert([
            'nama' => 'Foto Calon Siswa'
        ]);

        DB::table('jenis_dokumen')->insert([
            'nama' => 'Akta Kawin Orangtua / Wali Siswa'
        ]);

        DB::table('jenis_dokumen')->insert([
            'nama' => 'Surat Baptis'
        ]);

        DB::table('jenis_dokumen')->insert([
            'nama' => 'Fotocopy Ijazah yang sudah dilegalisir'
        ]);
        
        DB::table('jenis_dokumen')->insert([
            'nama' => 'Fotocopy SKHU yang sudah dilegalisir'
        ]);

        DB::table('jenis_dokumen')->insert([
            'nama' => 'Fotocopy Rapor Kelas 5'
        ]);

        DB::table('jenis_dokumen')->insert([
            'nama' => 'Fotocopy Rapor Kelas 6'
        ]);

        DB::table('jenis_dokumen')->insert([
            'nama' => 'Fotocopy Rapor Kelas 7'
        ]);

        DB::table('jenis_dokumen')->insert([
            'nama' => 'Fotocopy Rapor Kelas 8'
        ]);

        DB::table('jenis_dokumen')->insert([
            'nama' => 'Fotocopy Rapor Kelas 9'
        ]);

        DB::table('jenis_dokumen')->insert([
            'nama' => 'Fotocopy Akte Kelahiran Calon Siswa'
        ]);

        DB::table('jenis_dokumen')->insert([
            'nama' => 'Fotocopy Kartu Keluarga & KTP'
        ]);
    }

    
}
