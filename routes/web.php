<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\SPKController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\LemburController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrintController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/printah', [App\Http\Controllers\PrintController::class, 'index']);



Route::group(['middleware' => ['auth', 'role:admin,user']], function () {

    //Laporan Lembur
    Route::get('/list-lembur', [LemburController::class, 'index'])->name('lembur.index');
    Route::get('/buat-laporan', [LemburController::class, 'create'])->name('lembur.create');
    Route::post('/lembur/store', [LemburController::class, 'store'])->name('lembur.store');
    Route::get  ('/print-data/{id}', [LemburController::class, 'show'])->name('lembur.show');
    Route::get('/edit-laporan/{id}', [LemburController::class, 'edit'])->name('lembur.edit');
    Route::put('/lembur/update/{id}', [LemburController::class, 'update'])->name('lembur.update');
    Route::delete('/lembur/delete/{id}', [LemburController::class, 'destroy'])->name('lembur.destroy');

    //Surat Perintah Kerja
    Route::get('/list-suratPK', [SPKController::class, 'index'])->name('spk.index');
    Route::get('/buat-surat', [SPKController::class, 'create'])->name('spk.create');
    Route::post('/suratPK/store', [SPKController::class, 'store'])->name('spk.store');
    Route::get('/edit-surat/{id}', [SPKController::class, 'create'])->name('spk.edit');
    Route::put('/suratPK/update/{id}', [SPKController::class, 'update'])->name('spk.update');
    Route::delete('/suratPK/delete/{id}', [SPKController::class, 'destroy'])->name('spk.destroy');

    //List Pekerjaan
    Route::get('/list-pekerjaan', [PekerjaanController::class, 'index'])->name('pekerjaan.index');
    Route::get('/buat-pekerjaan', [PekerjaanController::class, 'create'])->name('pekerjaan.create');
    Route::post('/pekerjaan/store', [PekerjaanController::class, 'store'])->name('pekerjaan.store');
    Route::get('/edit-pekerjaan/{id}', [PekerjaanController::class, 'create'])->name('pekerjaan.edit');
    Route::put('/pekerjaan/update/{id}', [PekerjaanController::class, 'update'])->name('pekerjaan.update');
    Route::delete('/pekerjaan/delete/{id}', [PekerjaanController::class, 'destroy'])->name('pekerjaan.destroy');

    Route::resource('profile', ProfilController::class);
});


Route::group(['middleware' => ['auth', 'role:admin']], function () {

    //User Route
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/buat-user', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::resource('jabatan', JabatanController::class);
});
