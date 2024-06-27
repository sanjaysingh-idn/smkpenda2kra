<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BrosurController;
use App\Http\Controllers\DataGuruController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\FasilitasSingkatController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\ProgramKeahlianController;
use App\Http\Controllers\SambutanKepalaSekolahController;
use App\Http\Controllers\SyaratPendaftaranController;
use App\Http\Controllers\SliderController;
use App\Models\Pendaftaran;

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

Route::get('/', [BerandaController::class, 'index']);

// LOGIN
// Route::get('/register', function () {
//     return view('register');
// });
// Route::get('/login', function () {
//     return view('login');
// });
Auth::routes();




Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index']);
        Route::resource('/profil', ProfilController::class)->names([
            'index'     => 'profil.index',
            'update'    => 'profil.update',
            'destroy'   => 'profil.destroy',
        ]);
        Route::resource('/user', UserController::class)->names([
            'index'     => 'user.index',
            'store'     => 'user.store',
            'update'    => 'user.update',
            'destroy'   => 'user.destroy',
        ]);
        Route::resource('/program-keahlian', ProgramKeahlianController::class)->names([
            'index'     => 'program-keahlian.index',
            'store'     => 'program-keahlian.store',
            'edit'      => 'program-keahlian.edit',
            'update'    => 'program-keahlian.update',
            'destroy'   => 'program-keahlian.destroy',
        ]);

        Route::resource('/berita', BeritaController::class)->names([
            'index'     => 'berita.index',
            'store'     => 'berita.store',
            'edit'      => 'berita.edit',
            'update'    => 'berita.update',
            'destroy'   => 'berita.destroy',
        ]);
        Route::resource('/slider', SliderController::class)->names([
            'index'     => 'slider.index',
            'store'     => 'slider.store',
            'edit'      => 'slider.edit',
            'update'    => 'slider.update',
            'destroy'   => 'slider.destroy',
        ]);
        Route::get('/berita/{id}/publish', [BeritaController::class, 'publish'])->name('berita.publish');
        Route::get('/sambutan', [SambutanKepalaSekolahController::class, 'index'])->name('sambutan');
        Route::put('/sambutan/{id}/update', [SambutanKepalaSekolahController::class, 'update'])->name('sambutan.update');

        Route::get('/fasilitas', [FasilitasSingkatController::class, 'index'])->name('fasilitas');
        Route::put('/fasilitas/{id}/update', [FasilitasSingkatController::class, 'update'])->name('fasilitas.update');

        Route::get('/brosur', [BrosurController::class, 'index'])->name('brosur');
        Route::post('/brosur/store', [BrosurController::class, 'store'])->name('brosur.store');
        Route::delete('/brosur/{id}/delete', [BrosurController::class, 'destroy'])->name('brosur.delete');
        Route::put('/brosur/{id}/update', [BrosurController::class, 'update'])->name('brosur.update');

        Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
        Route::post('/galeri/store', [GaleriController::class, 'store'])->name('galeri.store');
        Route::delete('/galeri/{id}/delete', [GaleriController::class, 'destroy'])->name('galeri.delete');

        Route::get('/guru', [DataGuruController::class, 'index'])->name('guru');
        Route::post('/guru/store', [DataGuruController::class, 'store'])->name('guru.store');
        Route::delete('/guru/{id}/delete', [DataGuruController::class, 'destroy'])->name('guru.delete');
        Route::put('/guru/{id}/update', [DataGuruController::class, 'update'])->name('guru.update');

        Route::get('/siswa', [DataSiswaController::class, 'index'])->name('siswa');
        Route::put('/siswa/{id}/update', [DataSiswaController::class, 'update'])->name('siswa.update');
        Route::post('/upload-grafik', [DataSiswaController::class, 'addGrafik'])->name('addGrafik');
        Route::delete('/grafik/{id}/delete', [DataSiswaController::class, 'deleteGrafik'])->name('deleteGrafik');

        Route::get('/syarat-ppdb', [SyaratPendaftaranController::class, 'index'])->name('syarat-ppdb');
        Route::put('/syarat-ppdb/{id}/update', [SyaratPendaftaranController::class, 'update'])->name('syarat-ppdb.update');
        Route::get('/syarat-ppdb/{id}/dibuka', [SyaratPendaftaranController::class, 'dibuka'])->name('syarat-ppdb.dibuka');
        Route::get('/syarat-ppdb/{id}/ditutup', [SyaratPendaftaranController::class, 'ditutup'])->name('syarat-ppdb.ditutup');

        Route::get('/ppdb', [PendaftaranController::class, 'index'])->name('ppdb');
        Route::get('/ppdb/{id}', [PendaftaranController::class, 'show'])->name('ppdb.show');

        Route::delete('/ppdb/{id}/delete', [PendaftaranController::class, 'destroy'])->name('ppdb.delete');
        Route::put('/ppdb/{id}/status', [PendaftaranController::class, 'status'])->name('ppdb.status');
    });
});

Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::post('pendaftaran-siswa/store', [PendaftaranController::class, 'store'])->name('pendaftaran-siswa.store');
    Route::get(
        'panel-siswa/{id}',
        [BerandaController::class, 'panel_siswa']
    )->name('panel-siswa');
});

Route::get('pendaftaran-siswa', [BerandaController::class, 'show_pendaftaran'])->name('pendaftaran-siswa');
// Halaman Home
Route::get('profil/{slug}', [BerandaController::class, 'show_profil'])->name('profil');
Route::get('program-keahlian/{slug}', [BerandaController::class, 'show_program'])->name('program-keahlian');
Route::get('akademik/data-guru', [BerandaController::class, 'show_guru'])->name('akademik.data-guru');
Route::get('akademik/data-siswa', [BerandaController::class, 'show_siswa'])->name('akademik.data-siswa');
Route::get('informasi/berita', [BerandaController::class, 'show_berita'])->name('informasi.berita');
Route::get('informasi/berita/{slug}', [BerandaController::class, 'show_berita_detail'])->name('informasi.berita.detail');
Route::get('informasi/galeri', [BerandaController::class, 'show_galeri'])->name('informasi.galeri');
// Route::get('pendaftaran-siswa', [BerandaController::class, 'show_pendaftaran'])->name('pendaftaran-siswa');
// Route::post('pendaftaran-siswa/store', [PendaftaranController::class, 'store'])->name('pendaftaran-siswa.store');
