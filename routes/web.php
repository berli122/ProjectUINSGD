<?php

use Illuminate\Support\Js;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SPKController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\LemburController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ChartJsController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\PekerjaanController;

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
    if(Auth::guest()){
        return view('auth.login');
    } else {
        return back();
    }
});


Route::get('/register', function () {
    return back();
});


// Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

//Print
Route::get('/print', [App\Http\Controllers\PrintController::class, 'print'])->name('spk.print');
Route::get('/print-pdf', [App\Http\Controllers\PrintController::class, 'generatePdf'])->name('spk.pdf');
Route::get('/print-pdfs', [App\Http\Controllers\PrintController::class, 'singlePrint'])->name('spk.pdfs');
Route::get('/printT', [App\Http\Controllers\PrintController::class, 'printView'])->name('printView');
Route::get('printT/{tglawal}/{tglakhir}', [App\Http\Controllers\PrintController::class, 'printT'])->name('spk.printT');




Route::group(['middleware' => ['auth', 'role:admin,user']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //Laporan Lembur
    Route::get('/list-lembur', [LemburController::class, 'index'])->name('lembur.index');
    Route::get('/buat-laporan', [LemburController::class, 'create'])->name('lembur.create');
    Route::post('/lembur/store', [LemburController::class, 'store'])->name('lembur.store');
    Route::get('/print-data/{id}', [LemburController::class, 'show'])->name('lembur.show');
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


    //List Golongan
    Route::get('/list-golongan', [GolonganController::class, 'index'])->name('golongan.index');
    Route::get('/buat-golongan', [GolonganController::class, 'create'])->name('golongan.create');
    Route::post('/golongan/store', [GolonganController::class, 'store'])->name('golongan.store');
    Route::get('/edit-golongan/{id}', [GolonganController::class, 'edit'])->name('golongan.edit');
    Route::put('/golongan/update/{id}', [GolonganController::class, 'update'])->name('golongan.update');
    Route::delete('/golongan/delete/{id}', [GolonganController::class, 'destroy'])->name('golongan.destroy');

    Route::get('/profile-user/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/print-spk', [SPKController::class, 'show'])->name('spk.show');
});


Route::group(['middleware' => ['auth', 'role:admin']], function () {

    //User Route
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/buat-user', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/chart', [ChartJsController::class, 'chart'])->name('utils.chart');

    Route::resource('jabatan', JabatanController::class);
});
