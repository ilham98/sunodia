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

use Illuminate\Support\Facades\Hash;

Route::get('test', function() {
    return Hash::make('admin');
});

Route::get('/', function () {
    $berita = \App\Berita::orderBy('created_at', 'desc')->get();
    foreach($berita as $b) {
        $first_img = '';
        $output = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $b->isi, $matches);
        $first_img = $matches[0][0];
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

Route::get('a/{tingkat}/berita', 'Managemen\BeritaController@index');
Route::get('a/{tingkat}/berita/tambah', 'Managemen\BeritaController@create');
Route::get('a/{tingkat}/berita/{id}/edit', 'Managemen\BeritaController@edit');
Route::put('a/{tingkat}/berita/{id}', 'Managemen\BeritaController@update');
Route::post('a/{tingkat}/berita', 'Managemen\BeritaController@store');
Route::delete('a/{tingkat}/berita/{id}', 'Managemen\BeritaController@destroy');

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