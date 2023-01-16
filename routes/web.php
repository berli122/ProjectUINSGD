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
    Route::resource('lembur', LemburController::class);

    //Lembur Route
    // Route::get('/lembur', [LemburController::class, 'index'])->name('lembur.index');
    // Route::post('/lembur/store', [LemburController::class, 'store'])->name('lembur.store');
    // Route::get('/lembur/create', [LemburController::class, 'create'])->name('lembur.create');
    // Route::get('/lembur/edit/{id}', [LemburController::class, 'edit'])->name('lembur.edit');
    // Route::put('/lembur/update/{id}', [LemburController::class, 'update'])->name('lembur.update');
    // Route::post('/lembur/delete/{id}', [LemburController::class, 'destroy'])->name('lembur.destroy');

    Route::resource('spk', SPKController::class);
    Route::resource('pekerjaan', PekerjaanController::class);
    Route::resource('profile',ProfilController::class);

});

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    // Alert::alert('Welcome', 'UIN PTIPD', 'success');
    Route::resource('user', UserController::class);
    Route::resource('jabatan', JabatanController::class);

});
