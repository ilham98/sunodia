<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeritaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('berita')->insert([
            'judul' => 'Berita 1',
            'isi' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p><img src="http://127.0.0.1:8000/uploads/_test-files/5db0a4b0b16fb.jpg" style="" width="606"></p><p><br></p>',
            'tingkat' => null
        ]);

        DB::table('berita')->insert([
            'judul' => 'Berita 2',
            'isi' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p><img src="http://127.0.0.1:8000/uploads/_test-files/5db0a4e153674.jpeg"></p>',
            'tingkat' => null
        ]);

        DB::table('berita')->insert([
            'judul' => 'Berita 3',
            'isi' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p><br></p><p><img src="http://127.0.0.1:8000/uploads/_test-files/5db0a43c93295.jpg" style="" width="711"></p>',
            'tingkat' => null
        ]);
    }
}
