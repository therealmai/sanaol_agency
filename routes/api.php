<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

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

// do "php artisan route:list" to view current routes

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/services', 'ServiceController@index');
Route::get('/services/{id}', 'ServiceController@show');
Route::patch('/services/{id}', 'ServiceController@update');

Route::get('news', [NewsController::class, 'index']);
Route::post('news/create', [NewsController::class, 'store']);
Route::get('news/{id}', [NewsController::class, 'show']);
Route::patch('news/{id}', [NewsController::class, 'update']);
Route::patch('news/delete/{id}', [NewsController::class, 'destroy']);