<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\RegistrasiSiswa;
use Illuminate\Support\Facades\Hash;

Route::get('test', function() {
    $reg = RegistrasiSiswa::first();
    $tingkat = '';
    switch($reg->tingkat) {
        case 1:
            $tingkat = 'KB';
            break;
        case 2:
            $tingkat = 'TK';
            break;
        case 3:
            $tingkat = 'SD';
            break;
        case 4:
            $tingkat = 'SMP';
            break;
        case 5:
            $tingkat = 'SMA';
            break;
    }
    $pdf = PDF::loadView('pdf.registrasi', compact('reg', 'tingkat'));
    return $pdf->stream();
    // return Hash::make('admin');
});

Route::get('/', function () {
    $berita = \App\Berita::orderBy('created_at', 'desc')->get();
    foreach($berita as $b) {
        $first_img = '';
        $output = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $b->isi, $matches);
        $first_img = isset($matches[0][0])  ? $matches[0][0] : null;
        if(empty($first_img)) {
            $first_img = null;
        }
        $isi = strip_tags($b->isi);
        $b->isi = substr($isi, 0, 100);
        $b->first_img = $first_img;
    }
    return view('welcome', compact('berita'));
});

Route::get('berita', 'BeritaController@index');
Route::get('berita/{id}', 'BeritaController@single');
Route::get('sejarah', 'TentangKamiController@sejarah');
Route::get('logo', 'TentangKamiController@logo');
Route::get('visi-misi', 'TentangKamiController@visi_misi');
Route::get('mars', 'TentangKamiController@mars');
Route::get('galeri', 'GaleriController@index');

Route::get('/a', function() {
    return view('admin.dashboard');
});

Route::get('a/example', function() {

});

Route::get('a/berita', 'Manajemen\BeritaController@index');
Route::get('a/berita/tambah', 'Manajemen\BeritaController@create');
Route::get('a/berita/{id}/edit', 'Manajemen\BeritaController@edit');
Route::put('a/berita/{id}', 'Manajemen\BeritaController@update');
Route::post('a/berita', 'Manajemen\BeritaController@store');
Route::delete('a/berita/{id}', 'Manajemen\BeritaController@destroy');

Route::get('a/{tingkat}/berita', 'ManajemenPersekolah\BeritaController@index');
Route::get('a/{tingkat}/berita/tambah', 'ManajemenPersekolah\BeritaController@create');
Route::get('a/{tingkat}/berita/{id}/edit', 'ManajemenPersekolah\BeritaController@edit');
Route::put('a/{tingkat}/berita/{id}', 'ManajemenPersekolah\BeritaController@update');
Route::post('a/{tingkat}/berita', 'ManajemenPersekolah\BeritaController@store');
Route::delete('a/{tingkat}/berita/{id}', 'ManajemenPersekolah\BeritaController@destroy');

Route::get('a/visi-misi', 'Profil\VisiMisiController@index');
Route::put('a/visi-misi', 'Profil\VisiMisiController@update');
Route::get('a/sejarah', 'Profil\SejarahController@index');
Route::put('a/sejarah', 'Profil\SejarahController@update');
Route::get('a/logo', 'Profil\LogoController@index');
Route::put('a/logo', 'Profil\LogoController@update');
Route::get('a/mars', 'Profil\MarsController@index');
Route::put('a/mars', 'Profil\MarsController@update');
Route::get('a/galeri/tambah', 'Admin\GaleriController@create');
Route::get('a/galeri', 'Admin\GaleriController@index');
Route::post('a/galeri', 'Admin\GaleriController@store');
Route::delete('a/galeri/{id}', 'Admin\GaleriController@destroy');
Route::get('a/galeri/{id}', 'Admin\GaleriController@single');
Route::put('a/galeri/{id}', 'Admin\GaleriController@update');
Route::post('a/galeri/{id}/photos', 'Admin\GaleriController@photo_store');
Route::delete('a/galeri/{id}/photos/{photo_id}', 'Admin\GaleriController@photo_destroy');

Route::get('registrasi', 'RegistrasiController@init');
Route::get('registrasi/1', 'RegistrasiController@step1')->middleware('registrasi');
Route::post('registrasi/1', 'RegistrasiController@step1_submit');
Route::get('registrasi/2', 'RegistrasiController@step2')->middleware('registrasi');
Route::post('registrasi/2', 'RegistrasiController@step2_submit');
Route::post('registrasi/2/saudara', 'RegistrasiController@step2_saudara_submit');
Route::delete('registrasi/2/saudara/{id}', 'RegistrasiController@step2_saudara_destroy');
Route::get('registrasi/3', 'RegistrasiController@step3')->middleware('registrasi');
Route::post('registrasi/3', 'RegistrasiController@step3_submit');
Route::get('registrasi/4', 'RegistrasiController@step4')->middleware('registrasi');
Route::post('registrasi/4', 'RegistrasiController@step4_submit');
Route::get('registrasi/5', 'RegistrasiController@step5')->middleware('registrasi');
Route::post('registrasi/5/kegemaran', 'RegistrasiController@step5_kegemaran_submit');
Route::delete('registrasi/5/kegemaran/{id}', 'RegistrasiController@step5_kegemaran_destroy');
Route::post('registrasi/5/prestasi', 'RegistrasiController@step5_prestasi_submit');
Route::delete('registrasi/5/prestasi/{id}', 'RegistrasiController@step5_prestasi_destroy');
Route::post('registrasi/5', 'RegistrasiController@step5_submit');
Route::get('registrasi/6', 'RegistrasiController@step6')->middleware('registrasi');
Route::put('registrasi/6/tinggal_bersama', 'RegistrasiController@step6_tinggal_bersama_update');
Route::post('registrasi/6', 'RegistrasiController@step6_submit');
Route::get('registrasi/7', 'RegistrasiController@step7')->middleware('registrasi');
Route::post('registrasi/7/dokumen/{id}', 'RegistrasiController@step7_update_dokumen');
Route::post('registrasi/7', 'RegistrasiController@step7_submit');
Route::get('registrasi/8', 'RegistrasiController@step8')->middleware('registrasi');
Route::post('registrasi/8', 'RegistrasiController@step8_submit');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

