<?php

use App\Http\Controllers\DepartementController;
use App\Http\Controllers\UserController; //mendaftarkan controler yang akan digunakan
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\GajiController;
use App\Models\Departements;

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
Route::get('/', function () {
    return view('welcome', ['title' => 'Welcome']);
})->name('welcome')->middleware('guest');

Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('home', function () {
        return view('home', ['title' => 'Home']);
    })->name('home');
    Route::get('password', [UserController::class, 'password'])->name('password');
    Route::post('password', [UserController::class, 'password_action'])->name('password.action');
    // Route Position
    Route::resource('positions', PositionController::class);
    Route::resource('departements', DepartementController::class);
    Route::resource('users', UserController::class);
    Route::resource('barangs', BarangController::class);
    Route::resource('golongans', GolonganController::class);
    Route::resource('gajis', GajiController::class);
    Route::get('departement/export-pdf', [DepartementsController::class, 'exportPdf'])->name('departements.exportPdf');
    Route::get('user/export-pdf', [UserController::class, 'exportPdf'])->name('users.exportPdf');
    Route::get('gaji/export-pdf', [GajiController::class, 'exportPdf'])->name('gajis.exportPdf');
    Route::get('position/export-excel', [PositionController::class, 'exportExcel'])->name('position.exportExcel');
    Route::get('departement/export-excel', [DepartementController::class, 'exportExcel'])->name('departement.exportExcel');
    Route::resource('raks', RakController::class);
    Route::get('search/barang', [BarangController::class, 'autocomplete'])->name('search.barang');
    Route::get('chart-line', [RakController::class, 'chartLine'])->name('raks.chartLine');
    Route::get('chart-line-ajax', [RakController::class, 'chartLineAjax'])->name('raks.chartLineAjax');
    
    // New profile route
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
});


