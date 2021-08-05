<?php

use App\Http\Controllers\Api\BajuController;
use App\Http\Controllers\Api\GeneralController;
use App\Http\Controllers\Api\HistoryController;
use App\Http\Controllers\Api\StoreController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/store')->group(function() {
    Route::get('/', [StoreController::class, 'index'])->name('store.index');
    Route::get('/find', [StoreController::class, 'find'])->name('store.find');
    Route::get('/coordinate', [StoreController::class, 'coordinate'])->name('store.find.coordinate');
    Route::get('/one/{id}',[StoreController::class, 'findOne'])->name('store.find.one');
});

Route::prefix('/history')->group(function() {
    Route::get('/get/{id}', [HistoryController::class, 'getHistory'])->name('history.get');
    Route::post('/get/{id}', [HistoryController::class, 'visit'])->name('history.visit');
});