<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SendController;

Route::controller(CommentController::class)->middleware('auth')->group(function(){
    Route::post('/songs/{song}/comment/second', 'store_second');
    Route::post('/songs/{song}/comment', 'store');//comment保存url
    
});

Route::controller(SendController::class)->middleware('auth')->group(function(){
    Route::post('/messages', 'store');
    Route::post('/songs/send', 'send');
    Route::get('/home', 'home')->name('home');
    
});

Route::controller(UserController::class)->middleware('auth')->group(function(){
    Route::get('/users/show', 'show')->name('index');
    Route::post('/users', 'store');
    Route::get('/users/{user}', 'show');
    Route::get('/users/{user}/edit', 'edit');
    Route::put('/users/{user}', 'update');
    
});

Route::controller(SongController::class)->middleware('auth')->group(function(){
    Route::get('/index', 'index')->name('profile');
    Route::get('/select', 'select')->name('select');
    Route::get('/songs/create', 'create');
    Route::get('/songs/{song}/edit', 'edit');
    Route::post('/songs', 'store');
    Route::get('/songs/{song}', 'show');
    Route::put('/songs/{song}', 'update');
    
});


Route::get('/', function () {
    return view('welcome');
});
require __DIR__.'/auth.php';












