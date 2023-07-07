<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MahasiswaController;

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

Route::get('/', [PostController::class, 'index']);
Route::get('posts/{slug}', [PostController::class, 'show'])
    ->name('posts.show');

Route::get('/fat', [PostController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::resource('mahasiswas', MahasiswaController::class);
Route::get('mahasiswa/nilai/{Nim}', [MahasiswaController::class, 'mahasiswaNilai'])->name('mahasiswa.nilai');
Route::get('mahasiswa/cetak_pdf/{Nim}', [MahasiswaController::class, 'cetak_pdf'])->name('mahasiswa.cetak');
Route::resource('articles', ArticleController::class);
Route::get('article/cetak_pdf', [ArticleController::class, 'cetak_pdf']);
