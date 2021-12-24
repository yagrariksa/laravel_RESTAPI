<?php

use App\Http\Controllers\Api\ProdukController;
use App\Http\Controllers\Api\GeneralController;
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

Route::get('/', [GeneralController::class, 'index'])->name('api.index');
Route::post('/login', [GeneralController::class, 'login'])->name('api.login');
Route::post('/signup', [GeneralController::class, 'signup'])->name('api.signup');

Route::get('/umkm', [GeneralController::class, 'umkm'])->name('api.umkm.index');
Route::get('/umkm/{id}', [GeneralController::class, 'umkmDetails'])->name('api.umkm.details');

Route::get('/token', function(){
    $data = User::whereNotNull('api_token')->first();
    if (!$data) {
        return response()->json([
            'message' => 'there is no data, please do db:seeder using artisan on your terminal'
        ], 404);
    }
    return response()->json([
        'token' => $data['api_token']
    ], 200);
})->name('get.token');

Route::prefix('/public')->group(function () {
    Route::get('/', [ProdukController::class, 'index'])->name('public.produk.index');
    Route::post('/', [ProdukController::class, 'store'])->name('public.produk.store');
    Route::get('/{id}', [ProdukController::class, 'show'])->name('public.produk.details');
    Route::post('/{id}', [ProdukController::class, 'update'])->name('public.produk.update');
    Route::delete('/{id}', [ProdukController::class, 'destroy'])->name('public.produk.delete');
});

Route::prefix('/private')->middleware('auth:api')->group(function () {
    Route::get('/', [ProdukController::class, 'index'])->name('private.produk.index');
    Route::post('/', [ProdukController::class, 'store'])->name('private.produk.store');
    Route::get('/{id}', [ProdukController::class, 'show'])->name('private.produk.details');
    Route::post('/{id}', [ProdukController::class, 'update'])->name('private.produk.update');
    Route::delete('/{id}', [ProdukController::class, 'destroy'])->name('private.produk.delete');
});
