<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SongController;

Route::get('/songs/test', [SongController::class, 'test']);

Route::get('/users/show', [UserController::class, 'show'])->name('index');

Route::post('/users',  [UserController::class, 'store']);
Route::get('/users/{user}', [UserController::class, 'show']);
Route::get('/users/{user}/edit', [UserController::class, 'edit']);
Route::put('/users/{user}', [UserController::class, 'update']);


Route::get('/index', [SongController::class, 'index'])->name('profile');
Route::get('/select', [SongController::class, 'select'])->name('select');
Route::get('/home', [SongController::class, 'home'])->name('home');

Route::get('/songs/create', [SongController::class, 'create']);
Route::get('/songs/{song}/edit', [SongController::class, 'edit']);
Route::post('/songs', [SongController::class, 'store']);
Route::get('/songs/{song}', [SongController::class ,'show']);
Route::put('/songs/{song}', [SongController::class, 'update']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');









});



