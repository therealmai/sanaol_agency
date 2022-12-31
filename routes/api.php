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
use App\Http\Controllers\PreviewEventController;
use App\Http\Controllers\PreviewNewsController;


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

    //User Images
    Route::post('user/image/', [UserImageController::class, 'store'])->name('userImage.store');
    Route::patch('user/image/{id}', [UserImageController::class, 'update'])->name('userImage.update');
    Route::patch('user/image/delete/{id}', [UserImageController::class, 'destroy'])->name('userImage.delete');
});

//For talents
Route::group(['middleware' => ['auth:talents']], function() {
    Route::patch('users_update/{id}', [UserController::class, 'update_talent'])->name('user.updateUser2');
});

//For admins
Route::group(['middleware' => ['auth:admins']], function() {
    //Users
    Route::post('users/create', [UserController::class, 'store'])->name('user.create');
    Route::get('users/currentUsers', [UserController::class, 'currentUsers'])->name('user.currentUsers');
    Route::get('users/applications', [UserController::class, 'applications'])->name('user.applications');
    Route::patch('users/{id}', [UserController::class, 'update'])->name('user.updateUser');
    Route::patch('users/approve/{id}', [UserController::class, 'approve'])->name('user.approve');
    Route::patch('users/delete/{id}', [UserController::class, 'destroy'])->name('user.deleteUser');

    //Services
    Route::post('/services/create', 'ServiceController@store');
    Route::patch('/services/delete/{id}', 'ServiceController@destroy');
    Route::post('/services/{id}', 'ServiceController@update');

    //HeroBanner
    Route::post('herobanner/create', [HeroBannerController::class, 'store']);
    Route::post('herobanners/{id}', [HeroBannerController::class, 'update']);
    Route::patch('herobanner/delete/{id}', [HeroBannerController::class, 'destroy']);

    //News
    Route::post('news/create', [NewsController::class, 'store'])->name('news.create');
    Route::post('news/{id}', [NewsController::class, 'update']);
    Route::patch('news/delete/{id}', [NewsController::class, 'destroy']);
    

    //Events
    Route::post('events/create', [EventsController::class, 'store'])->name('events.create');
    Route::post('events/{id}', [EventsController::class, 'update'])->name('events.update');
    Route::patch('events/delete/{id}', [EventsController::class, 'destroy'])->name('events.delete');

    //Preview Events
    Route::post('preview/events', [PreviewEventController::class, 'store']);
    Route::patch('preview/events', [PreviewEventController::class, 'update']);
    Route::patch('preview/events/delete/{id}', [PreviewEventController::class, 'destroy']);

    //Preview News
    Route::post('preview/news/create', [PreviewNewsController::class, 'store']);
    Route::patch('preview/news', [PreviewNewsController::class, 'update']);
    Route::patch('preview/news/delete/{id}', [PreviewNewsController::class, 'destroy']);
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

//News
Route::get('news', [NewsController::class, 'index']);
Route::get('news/{id}', [NewsController::class, 'show']);

//UserImage
Route::get('user/image/{id}', [UserImageController::class, 'show'])->name('userImage.show');

//Events
Route::get('events', [EventsController::class, 'index'])->name('events.get');
Route::get('events/{id}', [EventsController::class, 'show'])->name('events.getSingle');

//Preview Events
Route::get('preview/events', [PreviewEventController::class, 'index']);
Route::get('preview/featured-events', [PreviewEventController::class, 'getFeaturedEvents']);
Route::get('preview/events/{id}', [PreviewEventController::class, 'show']);

//Preview News
Route::get('preview/news', [PreviewNewsController::class, 'index']);
Route::get('preview/featured-news', [PreviewNewsController::class, 'getFeaturedNews']);
Route::get('preview/news/{id}', [PreviewNewsController::class, 'show']);


