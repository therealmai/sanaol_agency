<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeroBannerController;
use App\Http\Controllers\BannerImageController;

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

Route::get('herobanner', [HeroBannerController::class, 'index']);
Route::post('herobanner', [HeroBannerController::class, 'store']);
Route::get('herobanner/{id}', [HeroBannerController::class, 'show']);
Route::patch('herobanner/{id}', [HeroBannerController::class, 'update']);
Route::patch('herobanner/delete/{id}', [HeroBannerController::class, 'destroy']);


Route::post('herobanner/image', [BannerImageController::class, 'store']);
Route::patch('herobanner/image/{id}', [BannerImageController::class, 'update']);
Route::patch('herobanner/image/delete/{id}', [BannerImageController::class, 'destroy']);
