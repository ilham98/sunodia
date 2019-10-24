<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function generateUrl($url) {
        return config('app.env') === 'production' ?
                    url($url) : secure_url($url); 
    }

    public function run()
    {
       
        DB::table('photos')->insert([
            'url' => $this->generateUrl('uploads/_test-galeri/5db08fb0db075.jpg'),
            'width' => 3465,
            'height' => 1657,
            'album_id' => 1
        ]);

        DB::table('photos')->insert([
            'url' => $this->generateUrl('uploads/_test-galeri/5db08fc1c7165.jpg'),
            'width' => 3504,
            'height' => 2336,
            'album_id' => 1
        ]);
    }
}
