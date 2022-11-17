<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/index', [UserController::class, 'index'])->name('profile');
Route::get('/users/show', [UserController::class, 'show'])->name('index');
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users',  [UserController::class, 'store']);
Route::get('/users/{user}', [UserController::class ,'show']);
Route::get('/users/{user}/edit', [UserController::class, 'edit']);
Route::put('/users/{user}', [UserController::class, 'update']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/', function () {
    return view('welcome');
});
