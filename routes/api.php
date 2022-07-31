<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiskonProductsController;
use App\Http\Controllers\NewProductsController;
use App\Http\Controllers\SecondProductsController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('produk/baru')->group(function() {
    Route::get('', [NewProductsController::class, 'index']);
    Route::post('store', [NewProductsController::class, 'store']);
    Route::post('update', [NewProductsController::class, 'update']);
    Route::post('delete', [NewProductsController::class, 'destroy']);
});

Route::prefix('produk/second')->group(function() {
    Route::get('', [SecondProductsController::class, 'index']);
    Route::post('store', [SecondProductsController::class, 'store']);
    Route::post('delete', [SecondProductsController::class, 'destroy']);
    Route::post('update', [SecondProductsController::class, 'update']);
});

Route::prefix('produk/diskon')->group(function() {
    Route::get('', [DiskonProductsController::class, 'index']);
    Route::post('store', [DiskonProductsController::class, 'store']);
    Route::post('delete', [DiskonProductsController::class, 'destroy']);
    Route::post('update', [DiskonProductsController::class, 'update']);
});

Route::prefix('produk/brand')->group(function () {
    Route::get('', [BrandsController::class, 'index']);
    Route::post('store', [BrandsController::class, 'store']);
    Route::post('delete', [BrandsController::class, 'destroy']);
    Route::post('update', [BrandsController::class, 'update']);
});

Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {
    Route::post('login', [AuthController::class,'login']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);
});