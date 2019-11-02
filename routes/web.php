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
use Illuminate\Support\Facades\DB;

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('/a', function() {
        $chart_1 = DB::table('registrasi_siswa')
                    ->select(DB::raw("tahun_pembelajaran, COUNT('id') AS count_siswa"))
                    ->where('saved', 1)
                    ->groupBy('tahun_pembelajaran')
                    ->orderBy('tahun_pembelajaran')
                    ->get();

        return view('admin.dashboard', compact('chart_1'));
    });

    Route::get('a/example/{id}', function($id) {
        return redirect('registrasi')->withCookie(cookie()->forever('registrasi_token', $id));

    });

    Route::get('a/berita', 'Manajemen\BeritaController@index');
    Route::get('a/berita/tambah', 'Manajemen\BeritaController@create');
    Route::get('a/berita/{id}/edit', 'Manajemen\BeritaController@edit');
    Route::put('a/berita/{id}', 'Manajemen\BeritaController@update');
    Route::post('a/berita', 'Manajemen\BeritaController@store');
    Route::delete('a/berita/{id}', 'Manajemen\BeritaController@destroy');

    Route::get('a/visi-misi', 'Profil\VisiMisiController@index');
    Route::put('a/visi-misi', 'Profil\VisiMisiController@update');
    Route::get('a/sejarah', 'Profil\SejarahController@index');
    Route::put('a/sejarah', 'Profil\SejarahController@update');
    Route::get('a/logo', 'Profil\LogoController@index');
    Route::put('a/logo', 'Profil\LogoController@update');
    Route::get('a/mars', 'Profil\MarsController@index');
    Route::put('a/mars', 'Profil\MarsController@update');
    Route::get('a/registrasi-siswa', 'Admin\RegistrasiSiswaController@index');
    Route::get('a/registrasi-siswa/pdf', 'Admin\RegistrasiSiswaController@pdf');
    Route::get('a/registrasi-siswa/{id}', 'Admin\RegistrasiSiswaController@single');
    Route::get('a/galeri/tambah', 'Admin\GaleriController@create');
    Route::get('a/galeri', 'Admin\GaleriController@index');
    Route::post('a/galeri', 'Admin\GaleriController@store');
    Route::delete('a/galeri/{id}', 'Admin\GaleriController@destroy');
    Route::get('a/galeri/{id}', 'Admin\GaleriController@single');
    Route::put('a/galeri/{id}', 'Admin\GaleriController@update');
    Route::post('a/galeri/{id}/photos', 'Admin\GaleriController@photo_store');
    Route::delete('a/galeri/{id}/photos/{photo_id}', 'Admin\GaleriController@photo_destroy');

    Route::get('a/{tingkat}/berita', 'ManajemenPersekolah\BeritaController@index');
    Route::get('a/{tingkat}/berita/tambah', 'ManajemenPersekolah\BeritaController@create');
    Route::get('a/{tingkat}/berita/{id}/edit', 'ManajemenPersekolah\BeritaController@edit');
    Route::put('a/{tingkat}/berita/{id}', 'ManajemenPersekolah\BeritaController@update');
    Route::post('a/{tingkat}/berita', 'ManajemenPersekolah\BeritaController@store');
    Route::delete('a/{tingkat}/berita/{id}', 'ManajemenPersekolah\BeritaController@destroy');

    Route::get('a/{tingkat}/profil', 'ManajemenPersekolah\ProfilController@index');
    Route::put('a/{tingkat}/profil', 'ManajemenPersekolah\ProfilController@update');

    Route::get('a/{tingkat}/fasilitas', 'ManajemenPersekolah\FasilitasController@index');
    Route::put('a/{tingkat}/fasilitas', 'ManajemenPersekolah\FasilitasController@update');

    Route::get('a/{tingkat}/agenda', 'ManajemenPersekolah\AgendaController@index');
    Route::post('a/{tingkat}/poster-penerimaan-siswa-baru', 'ManajemenPersekolah\AgendaController@update_poster_penerimaan_siswa_baru');
    Route::post('a/{tingkat}/kalender-pendidikan', 'ManajemenPersekolah\AgendaController@update_kalender_pendidikan');
    Route::post('a/{tingkat}/agenda-kegiatan', 'ManajemenPersekolah\AgendaKegiatanController@store');
    Route::delete('a/{tingkat}/agenda-kegiatan/{id}', 'ManajemenPersekolah\AgendaKegiatanController@destroy');

    Route::get('a/{tingkat}/struktur-organisasi', 'ManajemenPersekolah\StrukturOrganisasiController@index');
    Route::post('a/{tingkat}/struktur-organisasi', 'ManajemenPersekolah\StrukturOrganisasiController@update');
    Route::get('a/{tingkat}/guru/tambah', 'ManajemenPersekolah\GuruController@create');
    Route::post('a/{tingkat}/guru', 'ManajemenPersekolah\GuruController@store');
    Route::get('a/{tingkat}/guru/{id}/edit', 'ManajemenPersekolah\GuruController@edit');
    Route::put('a/{tingkat}/guru/{id}', 'ManajemenPersekolah\GuruController@update');
    Route::delete('a/{tingkat}/guru/{id}', 'ManajemenPersekolah\GuruController@destroy');

    Route::get('a/{tingkat}/galeri/tambah', 'ManajemenPersekolah\GaleriController@create');
    Route::get('a/{tingkat}/galeri', 'ManajemenPersekolah\GaleriController@index');
    Route::post('a/{tingkat}/galeri', 'ManajemenPersekolah\GaleriController@store');
    Route::delete('a/{tingkat}/galeri/{id}', 'ManajemenPersekolah\GaleriController@destroy');
    Route::get('a/{tingkat}/galeri/{id}', 'ManajemenPersekolah\GaleriController@single');
    Route::put('a/{tingkat}/galeri/{id}', 'ManajemenPersekolah\GaleriController@update');
    Route::post('a/{tingkat}/galeri/{id}/photos', 'ManajemenPersekolah\GaleriController@photo_store');
    Route::delete('a/{tingkat}/galeri/{id}/pshotos/{photo_id}', 'ManajemenPersekolah\GaleriController@photo_destroy');

    Route::get('a/{tingkat}/prestasi', 'ManajemenPersekolah\PrestasiController@index');
    Route::get('a/{tingkat}/prestasi/tambah', 'ManajemenPersekolah\PrestasiController@create');
    Route::get('a/{tingkat}/prestasi/{id}/edit', 'ManajemenPersekolah\PrestasiController@edit');
    Route::post('a/{tingkat}/prestasi', 'ManajemenPersekolah\PrestasiController@store');
    Route::post('a/{tingkat}/prestasi/{id}', 'ManajemenPersekolah\PrestasiController@update');
    Route::delete('a/{tingkat}/prestasi/{id}', 'ManajemenPersekolah\PrestasiController@destroy');

    Route::get('a/konfigurasi', 'Admin\KonfigurasiController@index');
    Route::put('a/konfigurasi', 'Admin\KonfigurasiController@update');

    Route::get('a/highlights', 'Admin\HighlightController@index');
    Route::post('a/highlights', 'Admin\HighlightController@store');
    Route::delete('a/highlights/{id}', 'Admin\HighlightController@destroy');

    Route::get('a/ganti-password', 'Admin\GantiPasswordController@index');
    Route::put('a/ganti-password', 'Admin\GantiPasswordController@update');
});

Route::get('pdf/registrasi-form/{id}', 'PDF\RegistrasiForm@index');

Route::get('/', function () {
    $berita = \App\Berita::where(function($query) {
        $query->where('tingkat', null)->orWhere('tingkat', '');
    })->orderBy('created_at', 'desc')->get();
    $highlights = \App\Highlight::orderBy('id', 'asc')->get();
    $profil = \App\Profil::first();
    $visi = $profil->visi;
    $misi = $profil->misi;
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
    return view('welcome', compact('berita', 'highlights', 'visi', 'misi'));
});

Route::get('berita', 'BeritaController@index');
Route::get('berita/{id}', 'BeritaController@single');
Route::get('sejarah', 'TentangKamiController@sejarah');
Route::get('logo', 'TentangKamiController@logo');
Route::get('visi-misi', 'TentangKamiController@visi_misi');
Route::get('mars', 'TentangKamiController@mars');
Route::get('galeri', 'GaleriController@index');

Route::get('{tingkat}/berita', 'Persekolah\BeritaController@index');
Route::get('{tingkat}/berita/{id}', 'Persekolah\BeritaController@single');
Route::get('{tingkat}/profil', 'Persekolah\ProfilController@index');
Route::get('{tingkat}/struktur-organisasi', 'Persekolah\StrukturOrganisasiController@index');
Route::get('{tingkat}/fasilitas', 'Persekolah\FasilitasController@index');
Route::get('{tingkat}/agenda-sekolah', 'Persekolah\AgendaSekolahController@index'); 
Route::get('{tingkat}/galeri', 'Persekolah\GaleriController@index'); 
Route::get('{tingkat}/prestasi', 'Persekolah\PrestasiController@index'); 

Route::middleware(['registrasi_open'])->group(function () {
    Route::get('registrasi', 'RegistrasiController@init');
    Route::get('registrasi/new-session', 'RegistrasiController@new_session');
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
    Route::get('registrasi/9', 'RegistrasiController@step9')->middleware('registrasi');
    Route::post('registrasi/9', 'RegistrasiController@step9_submit');    
});

Route::get('{tingkat}/prestasi', 'Persekolah\PrestasiController@index');

Auth::routes();

Route::get('register', function() {
    return redirect(url('/'));
});

Route::get('{tingkat}', function($tingkat) {
    $berita = \App\Berita::orderBy('id', 'desc')->where('tingkat', $tingkat)->limit(3)->get();
    $prestasi = \App\Prestasi::orderBy('id', 'desc')->where('tingkat', $tingkat)->limit(10)->get();
    return view('persekolah.home', compact('tingkat', 'berita', 'prestasi'));
});