<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('users/all', [UserController::class, 'index'])->name('user.index');
Route::post('users/create', [UserController::class, 'store'])->name('user.create');
Route::get('users/{id}', [UserController::class, 'getUser'])->name('user.getUser');
Route::put('users/{id}', [UserController::class, 'update'])->name('user.updateUser');
Route::delete('users/{id}', [UserController::class, 'destroy'])->name('user.deleteUser');