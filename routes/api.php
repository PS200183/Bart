<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\ProductsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/login', [AuthenticationController::class, 'login']);
//Route::get('products', [ProductsController::class, 'index']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('products', [ProductsController::class, 'index']);
});
