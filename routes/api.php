<?php

use App\Http\Controllers\Api\BajuController;
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
    Route::get('/', [BajuController::class, 'index'])->name('public.baju.index');
    Route::post('/', [BajuController::class, 'store'])->name('public.baju.store');
    Route::get('/{id}', [BajuController::class, 'show'])->name('public.baju.details');
    Route::post('/{id}', [BajuController::class, 'update'])->name('public.baju.update');
    Route::delete('/{id}', [BajuController::class, 'destroy'])->name('public.baju.delete');
});

Route::prefix('/private')->middleware('auth:api')->group(function () {
    Route::get('/', [BajuController::class, 'index'])->name('private.baju.index');
    Route::post('/', [BajuController::class, 'store'])->name('private.baju.store');
    Route::get('/{id}', [BajuController::class, 'show'])->name('private.baju.details');
    Route::post('/{id}', [BajuController::class, 'update'])->name('private.baju.update');
    Route::delete('/{id}', [BajuController::class, 'destroy'])->name('private.baju.delete');
});
