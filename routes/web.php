<?php

use App\Http\Controllers\VinylRecordController;
use App\Http\Controllers\GenreController;
use \App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/hello', function () {
   return view('hello', ['title' => 'hello world!']);
});

///////////////////////////////////////////////////////////////////////////////

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/auth', [LoginController::class, 'authenticate'])->name('auth');

///////////////////////////////////////////////////////////////////////////////

Route::get('/records', [VinylRecordController::class, 'index']);
Route::get('/record/create', [VinylRecordController::class, 'create'])->middleware('auth');
Route::get('/record/edit/{id}', [VinylRecordController::class, 'edit'])->middleware('auth');
Route::get('/record/{id}', [VinylRecordController::class, 'index'])->middleware('auth');
Route::get('/record/destroy/{id}', [VinylRecordController::class, 'destroy'])->middleware('auth');

Route::post('/record/update/{id}', [VinylRecordController::class, 'update'])->middleware('auth');
Route::post('/record', [VinylRecordController::class, 'store']);

///////////////////////////////////////////////////////////////////////////////

Route::get('/user/{id}', [UserController::class, 'show']);

///////////////////////////////////////////////////////////////////////////////

Route::get('/genres', [GenreController::class, 'index']);
Route::get('/genre/{id}', [GenreController::class, 'show']);

///////////////////////////////////////////////////////////////////////////////

Route::get('/', function () {
    return view('welcome');
});
