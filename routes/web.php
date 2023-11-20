<?php

use App\Http\Controllers\admin\GuruController;
use App\Http\Controllers\admin\KelasController;
use App\Http\Controllers\admin\MapelController;
use App\Http\Controllers\admin\SiswaController;
use App\Http\Controllers\admin\TapelController;
use App\Http\Controllers\ProfileUserController;
use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;

// <--START MODAL HOMPAGE-->
Route::get('/', function(){
    return view('homepage');
  });
// <--END MODAL HOMEPAGE-->

// <--START MODAL LOGIN AND MIDDLEWARE-->
Route::group(['middleware' => ['web', 'guest']], function() {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/dologin', [AuthController::class, 'dologin'])->name('dologin');
});

Route::group(['middleware' => ['web', 'auth', 'checkrole:1,2,3']], function() {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/redirect', [RedirectController::class, 'cek']);
});

Route::group(['middleware' => ['web', 'auth', 'checkrole:1']], function() {
    Route::get('/admin', [DashboardController::class, 'indexAdmin'])->name('dashboard.admin');
});

Route::group(['middleware' => ['web', 'auth', 'checkrole:2']], function() {
    Route::get('/guru', [DashboardController::class, 'indexGuru'])->name('dashboard.guru');
});

Route::group(['middleware' => ['web', 'auth', 'checkrole:3']], function() {
    Route::get('/siswa', [DashboardController::class, 'indexSiswa'])->name('dashboard.siswa');
});
// <--END MODAL LOGIN AND MIDDLEWARE-->

// <--START MODAL PROFILE/USER-->
Route::get('/profile', [ProfileUserController::class,'index'])->name('profile');
// <--END MODAL PROFILE/USER-->

// <--START MODAL JIKA USER GAGAL LOGIN-->
Route::get('/unauthorized', function () {
    return view('errorpage.404');
})->name('unauthorized');
// <--END MODAL JIKA USER GAGAL LOGIN-->


// <--START MODAL ROLE ADMIN-->

// <--END MODAL USER-->
Route::get('/admin/user',[UserController::class,'indexUser'])->name('user.index');
Route::post('admin/user/store', [UserController::class, 'storeUser'])->name('user.store');
Route::put('admin/user/update/{id}', [UserController::class, 'updateUser'])->name('user.update');
// <--END MODAL USER-->

// <--START MODAL SISWA-->
Route::get('/admin/siswa',[SiswaController::class,'indexSiswa'])->name('siswa.index');
Route::post('admin/siswa/store', [SiswaController::class, 'storeSiswa'])->name('siswa.store');
Route::put('admin/siswa/update/{id}', [SiswaController::class, 'updateSiswa'])->name('siswa.update');
Route::get('admin/siswa/delete/{id}',[SiswaController::class,'destroySiswa']);
// <--END MODAL SISWA-->

// <--START MODAL KELAS-->
Route::get('/admin/kelas',[KelasController::class,'indexKelas'])->name('kelas.index');
Route::post('admin/kelas/store', [KelasController::class, 'storeKelas'])->name('kelas.store');
// <--END MODAL KELAS-->

// <--START MODAL TAPEL-->
Route::get('/admin/tapel',[TapelController::class,'indexTapel'])->name('tapel.index');
Route::post('admin/tapel/store', [TapelController::class, 'storeTapel'])->name('tapel.store');
// <--END MODAL TAPEL-->

// <--START MODAL MAPEL-->
Route::get('/admin/mapel',[MapelController::class,'indexMapel'])->name('mapel.index');
Route::post('admin/mapel/store', [MapelController::class, 'storeMapel'])->name('mapel.store');
Route::put('admin/mapel/update/{id}', [MapelController::class, 'updateMapel'])->name('mapel.update');
// <--END MODAL TAPEL-->

// <--START MODAL GURU-->
Route::get('/admin/guru',[GuruController::class,'indexGuru'])->name('guru.index');
Route::post('admin/guru/store', [GuruController::class, 'storeGuru'])->name('guru.store');
Route::put('admin/guru/update/{id}', [GuruController::class, 'updateGuru'])->name('guru.update');
// <--END MODAL GURU-->

// <--END MODAL ROLE ADMIN-->





Route::get('/loading', function () {
    return view('loading');
});



























// <-- START MODAL TEMPLATE -->
Route::get('/master', function () {
    return view('master');
});
// <-- END MODAL TEMPLATE -->