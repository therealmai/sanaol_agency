<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HeroBannerController;
use App\Http\Controllers\BannerImageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserImageController;
use App\Http\Controllers\EventsController;


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

//Protected Routes
//For all users
Route::group(['middleware' => ['auth:sanctum']], function() {
    //Auth
    Route::post('auth/logout', [AuthController::class, 'logout']);
});

//For talents
Route::group(['middleware' => ['auth:talents']], function() {
    //
});

//For admins
Route::group(['middleware' => ['auth:admins']], function() {
    //Users
    Route::post('users/create', [UserController::class, 'store'])->name('user.create');
    Route::patch('users/{id}', [UserController::class, 'update'])->name('user.updateUser');
    Route::patch('users/delete/{id}', [UserController::class, 'destroy'])->name('user.deleteUser');

    //Services
    Route::patch('/services/{id}', 'ServiceController@update');
    Route::post('/services/create', 'ServiceController@store');
    Route::patch('/services/delete/{id}', 'ServiceController@destroy');

    //HeroBanner
    Route::post('herobanner/create', [HeroBannerController::class, 'store']);
    Route::patch('herobanner/{id}', [HeroBannerController::class, 'update']);
    Route::patch('herobanner/delete/{id}', [HeroBannerController::class, 'destroy']);

    //HeroBanner Images
    Route::post('herobanner/image', [BannerImageController::class, 'store']);
    Route::patch('herobanner/image/{id}', [BannerImageController::class, 'update']);
    Route::patch('herobanner/image/delete/{id}', [BannerImageController::class, 'destroy']);
});

//Public Routes
//Auth
Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);


//Users
Route::get('users', [UserController::class, 'index'])->name('user.index');
Route::get('users/members', [UserController::class, 'memberPage'])->name('user.members');
Route::get('users/nonmembers', [UserController::class, 'nonMemberPage'])->name('user.nonmembers');
Route::get('users/{id}', [UserController::class, 'show'])->name('user.getUser');


//Services
Route::get('/services', 'ServiceController@index');
Route::get('/services/{id}', 'ServiceController@show');

//HeroBanner
Route::get('herobanner', [HeroBannerController::class, 'index']);
Route::get('herobanner/{id}', [HeroBannerController::class, 'show']);

//HeroBanner Images
Route::get('herobanner/image/{id}', [BannerImageController::class, 'show']);
Route::post('herobanner/image', [BannerImageController::class, 'store']);
Route::patch('herobanner/image/{id}', [BannerImageController::class, 'update']);
Route::patch('herobanner/image/delete/{id}', [BannerImageController::class, 'destroy']);

//News 
Route::get('news', [NewsController::class, 'index']);
Route::post('news/create', [NewsController::class, 'store']);
Route::get('news/{id}', [NewsController::class, 'show']);
Route::patch('news/{id}', [NewsController::class, 'update']);
Route::patch('news/delete/{id}', [NewsController::class, 'destroy']);

//UserImage
Route::get('user/image/{id}', [UserImageController::class, 'show'])->name('userImage.show');
Route::post('user/image/', [UserImageController::class, 'store'])->name('userImage.store');
Route::patch('user/image/{id}', [UserImageController::class, 'update'])->name('userImage.update');
Route::patch('user/image/delete/{id}', [UserImageController::class, 'destroy'])->name('userImage.delete');

//Events
Route::get('events', [EventsController::class, 'index'])->name('events.get');
Route::get('events/{id}', [EventsController::class, 'show'])->name('events.getSingle');
Route::post('events/create', [EventsController::class, 'store'])->name('events.create');
Route::patch('events/{id}', [EventsController::class, 'update'])->name('events.update');
Route::patch('events/delete/{id}', [EventsController::class, 'destroy'])->name('events.delete');
