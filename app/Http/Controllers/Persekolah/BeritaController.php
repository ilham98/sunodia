<?php

namespace App\Http\Controllers\Persekolah;

use App\Berita;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index($tingkat) {
        $berita = Berita::where('tingkat', $tingkat)->orderBy('created_at', 'desc')->paginate(10);
        foreach($berita as $b) {
            $first_img = '';
            $output = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $b->isi, $matches);
            $first_img = isset($matches[0][0]) ? $matches[0][0] : null;
            if(empty($first_img)) {
                $first_img = null;
            }
            $isi = strip_tags($b->isi);
            $b->isi = substr($isi, 0, 100);
            $b->first_img = $first_img;
        }


        return view('persekolah.berita.index', compact('berita', 'tingkat'));
    }

    public function single($tingkat, $id) {
        $berita = Berita::find($id);
        return view('persekolah.berita.single', compact('berita', 'tingkat'));
    }
}
