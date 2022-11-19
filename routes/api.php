<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeroBannerController;

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
Route::post('herobanner/create', [HeroBannerController::class, 'createBanner']);
Route::patch('herobanner/update/{id}', [HeroBannerController::class, 'updateBanner']);
Route::patch('herobanner/delete/{id}', [HeroBannerController::class, 'deleteBanner']);
Route::post('herobanner/image/create', [HeroBannerController::class, 'createBannerImage']);
Route::patch('herobanner/image/update/{id}', [HeroBannerController::class, 'updateBannerImage']);
Route::patch('herobanner/image/delete/{id}', [HeroBannerController::class, 'deleteBannerImage']);
