<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookedActivityController;
use App\Http\Controllers\HotelInfoController;
use App\Http\Controllers\ReviewHotelController;
use App\Http\Controllers\RoomsController;
use App\Models\BookedActivity;
use App\Models\ReviewHotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\NewPasswordController;

use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\api\HotelsApi\LoginHotelController;
use App\Http\Controllers\CityController;

use App\Http\Controllers\Api\HotelsApi\RegisterHotelsController;
use App\Http\Controllers\Api\EmailVerficationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Hotels\HotelsController;
use App\Models\Category;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout',[LoginController::class, 'logout']);

});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});

// Admin Routes
Route::post('/register',[RegisterController::class, 'register']);
Route::post('/login',[LoginController::class, 'login']);
Route::post('/verification-notification', [EmailVerficationController::class, 'sendVerficationEmail'])->middleware('auth:sanctum');
Route::get('verify-email/{id}/{hash}', [EmailVerficationController::class, 'verify'])->name('verification.verify');
Route::post('/forget-password', [NewPasswordController::class, 'forgotPassword']);
Route::post('/reset-password', [NewPasswordController::class, 'reset']);
// Hotels Routes
route::get('/Allhotles',[HotelsController::class,'index']);
route::post('/Registerhotels',[RegisterHotelsController::class,'register']);
route::post('/LoginHotels',[LoginHotelController::class,'login']);
route::get('/City',[CityController::class,'index']);

route::get('/categoryID',[CategoryController::class,'index']);
route::post('/categoryID/insert',[CategoryController::class,'create']);
route::put('/categoryID/update',[CategoryController::class,'update']);
route::delete('/categoryID/delete/{id}',[CategoryController::class,'delete']);

// activities
route::get('/activiy',[ActivityController::class,'index']);
route::post('/activiy/insert',[ActivityController::class,'create']);
route::put('/activiy/update',[ActivityController::class,'update']);
route::delete('/activiy/delete/{id}',[ActivityController::class,'delete']);

// booked
route::get('/activiy/booked',[BookedActivityController::class,'index']);


//
route::get('/hotel',[HotelInfoController::class,'index']);

// review Hotel
route::get('/hotel/review',[ReviewHotelController::class,'index']);
route::get('/hotel/rooms',[RoomsController::class,'index']);
