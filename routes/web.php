<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BajuController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'auth'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'create'])->name('register');
});

Route::middleware('auth')->group(function(){
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::prefix('/baju')->group(function () {
        Route::get('/', [BajuController::class, 'index'])->name('baju.index');
        Route::get('/create', [BajuController::class, 'create'])->name('baju.create');
        Route::post('/create', [BajuController::class, 'store'])->name('baju.store');
        Route::get('/{id}', [BajuController::class, 'edit'])->name('baju.edit');
        Route::post('/{id}', [BajuController::class, 'update'])->name('baju.update');
        Route::delete('/{id}', [BajuController::class, 'destroy'])->name('baju.delete');
    });
});
