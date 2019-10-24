<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(BeritaTableSeeder::class);
        $this->call(AlbumTableSeeder::class);
        $this->call(PhotosTableSeeder::class);
        $this->call(ProfilTableSeeder::class);
        $this->call(JenisDokumenTableSeeder::class);
    }
}
