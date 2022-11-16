<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfilController;

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

Route::get('/', [PengunjungController::class, 'index']);

//auth

Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/login/process', [AuthController::class, 'auth']);
Route::get('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/register/process', [AuthController::class, 'create']);
Route::get('/auth/logout', [AuthController::class, 'logout']);

//admin
Route::middleware(['isLogin', 'isAdmin'])->group(function () {
    Route::get('/berandaadmin', [AdminController::class, 'index']);
    // Route::get('/profiladmin', [AdminController::class, 'profiladmin']);
    Route::get('/editprofiladmin', [AdminController::class, 'editprofil']);
    Route::get('/ubahpwadmin', [AdminController::class, 'ubahpw']);
    Route::get('/datapetugas', [AdminController::class, 'tampilpetugas']);
    Route::get('/createpetugas', [AdminController::class, 'createpetugas'])->name("createpetugas");
    Route::post('/tambahpetugas', [AdminController::class, 'storepetugas'])->name("tambahpetugas");
    Route::get('/editpetugas/{id}', [AdminController::class, 'editpetugas'])->name("editpetugas");
    Route::post('/updatepetugas/{id}', [AdminController::class, 'updatepetugas']);
    Route::post('/destroypetugas/{id}', [AdminController::class, 'destroypetugas']);

    //paket
    Route::get('/datajenispaket', [AdminController::class, 'tampilpaket']);
    Route::get('/createpaket', [AdminController::class, 'createpaket'])->name("createpaket");
    Route::post('/tambahpaket', [AdminController::class, 'storepaket'])->name("tambahpaket");
    Route::get('/editpaket/{id?}', [AdminController::class, 'editpaket'])->name("editpaket");
    Route::post('/editpaket/{id}', [AdminController::class, 'updatepaket']);
    Route::post('/destroypaket/{id}', [AdminController::class, 'destroypaket']);

    //promo
    Route::get('/datapromo', [AdminController::class, 'tampilpromo']);
    Route::get('/createpromo', [AdminController::class, 'createpromo'])->name("createpromo");;
    Route::post('/tambahpromo', [AdminController::class, 'storepromo'])->name("tambahpromo");
    Route::get('/editpromo/{id?}', [AdminController::class, 'editpromo'])->name("editpromo");
    Route::post('/editpromo/{id}', [AdminController::class, 'updatepromo']);
    Route::post('/destroypromo/{id}', [AdminController::class, 'destroypromo']);

    Route::get('/datapenyewa', [AdminController::class, 'datapenyewa']);
    Route::get('/datareservasiall', [AdminController::class, 'reservasiadm']);
    Route::get('/detailreservasi/{id_reservasi}', [AdminController::class, 'detailreservasi']);
    Route::post('/updatereservasi/{id_reservasi}', [AdminController::class, 'updateReservasi']);
    Route::get('/reservasi/cari', [AdminController::class, 'cari']);

    Route::get('profiladmin/{id}', [AdminController::class, 'profil']);
    Route::post('simpanprofiladmin', [AdminController::class, 'simpanprofil']);
});

//artikel
Route::get('/dataartikel', [AdminController::class, 'tampilartikel']);
Route::get('/createartikel', [AdminController::class, 'createartikel'])->name("createartikel");;
Route::post('/tambahartikel', [AdminController::class, 'storeartikel'])->name("tambahartikel");
Route::get('/editartikel/{id?}', [AdminController::class, 'editartikel'])->name("editartikel");
Route::post('/editartikel/{id}', [AdminController::class, 'updateartikel']);
Route::post('/destroyartikel/{id}', [AdminController::class, 'destroyartikel']);

//galeri
Route::get('/datagaleri', [AdminController::class, 'tampilgaleri']);
Route::get('/creategaleri', [AdminController::class, 'creategaleri'])->name("creategaleri");;
Route::post('/tambahgaleri', [AdminController::class, 'storegaleri'])->name("tambahgaleri");
Route::get('/editgaleri/{id?}', [AdminController::class, 'editgaleri'])->name("editgaleri");
Route::post('/editgaleri/{id}', [AdminController::class, 'updategaleri']);
Route::post('/destroygaleri/{id}', [AdminController::class, 'destroygaleri']);

Route::get('/laporan', [AdminController::class, 'laporan']);


Route::get('/datalaporan', [AdminController::class, 'datalaporan']);
Route::get('/datalaporanpetugas', [PetugasController::class, 'datalaporan']);

Route::get('/ubahpwadmin', [AdminController::class, 'ubahpw']);
Route::get('/editprofiladmin', [AdminController::class, 'editprofil']);



// pengunjung
Route::get('/berandapengunjung', [PengunjungController::class, 'index']);
Route::get('/artikelpengunjung', [PengunjungController::class, 'artikel']);
Route::get('/detailartikel/{id_artikel}', [PengunjungController::class, 'detailartikel']);
Route::get('/galeripengunjung', [PengunjungController::class, 'galeri']);
Route::get('/jenispaketpengunjung', [PengunjungController::class, 'jenispaket']);
Route::middleware(['isLogin', 'isPengunjung'])->group(function () {
    Route::get('/berandapengunjunglgn', [PengunjungController::class, 'beranda']);
    Route::get('/artikelpengunjunglgn', [PengunjungController::class, 'artikellgn']);
    Route::get('/detailartikellgn/{id_artikel}', [PengunjungController::class, 'detailartikellgn']);
    Route::get('/galeripengunjunglgn', [PengunjungController::class, 'galerilgn']);
    Route::get('/jenispaketpengunjunglgn', [PengunjungController::class, 'jenispaketlgn']);
    Route::get('/reservasi', [PengunjungController::class, 'reservasi']);
    Route::post('/reservasi/add', [PengunjungController::class, 'storereservasi']);
    Route::get('/history', [PengunjungController::class, 'history']);
    Route::get('/reservasi/{id?}', [PengunjungController::class, 'editreservasi'])->name("editreservasi");
    Route::post('reservasi/edit/{id}', [PengunjungController::class, 'update']);

    Route::get('profilpengunjung/{id}', [PengunjungController::class, 'profil']);
    Route::post('simpanprofilpengunjung', [PengunjungController::class, 'simpanprofil']);
    Route::get('pengunjungcetak/{id}', [PengunjungController::class, 'cetak_reservasi']);
});

//petugas
Route::middleware(['isLogin', 'isPetugas'])->group(function () {
    Route::get('/berandapetugas', [PetugasController::class, 'index']);
    Route::get('/datareservasipetugas', [PetugasController::class, 'reservasipetugas']);
    Route::get('/tambahreservasipetugas', [PetugasController::class, 'tambahreservasipetugas']);
    Route::get('/registersewa', [PetugasController::class, 'registersewa']);
    Route::get('/detailreservasipetugas/{id_reservasi}', [PetugasController::class, 'detailreservasipetugas']);
    Route::get('/reservasipetugas/cari', [PetugasController::class, 'carireservasiptg']);

    Route::get('profilpetugas/{id}', [PetugasController::class, 'profil']);
    Route::post('simpanprofilpetugas', [PetugasController::class, 'simpanprofil']);

    Route::get('petugascetak/{id}', [PetugasController::class, 'cetak_reservasi']);
});
