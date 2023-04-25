<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookedActivityController;
use App\Http\Controllers\HotelInfoController;
use App\Http\Controllers\InterstedController;
use App\Http\Controllers\ReviewHotelController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\UserInterstedController;
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
], function ($router)
{
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
//city
route::get('/City',[CityController::class,'index']);
// interstance
route::get('/Intersted',[InterstedController::class,'index']);
route::post('/Intersted/create',[InterstedController::class,'create']);
route::put('/Intersted/update',[InterstedController::class,'update']);
route::delete('/Intersted/delete',[InterstedController::class,'delete']);
// category done
//user intersted
route::get('/InterstedUser',[UserInterstedController::class,'index']);
route::get('/InterstedUser/{id}',[UserInterstedController::class,'getUserIntersted']);
route::post('/InterstedUser/add',[UserInterstedController::class,'addUserInterstend']);

/////////////////////////////////////////////////////////////////////////////
route::get('/category',[CategoryController::class,'index']);
route::post('/category/insert',[CategoryController::class,'create']);
route::put('/category/update',[CategoryController::class,'update']);
route::delete('/category/delete/{id}',[CategoryController::class,'delete']);
/////////////////////////////////////////////////////////////////////////////

// activities done
/////////////////////////////////////////////////////////////////////////////
route::get('/activiy',[ActivityController::class,'index']);
route::post('/activiy/insert',[ActivityController::class,'create']);
route::put('/activiy/update/{id}',[ActivityController::class,'update']);
route::delete('/activiy/delete/{id}',[ActivityController::class,'delete']);
/////////////////////////////////////////////////////////////////////////////
// booked
route::get('/activiy/booked',[BookedActivityController::class,'index']);
route::get('/activiy/booked/{id}',[BookedActivityController::class,'getById']);
route::post('/activiy/booked/bookActivity',[BookedActivityController::class,'bookedActivity']);
route::put('/activiy/booked/updateActivity',[BookedActivityController::class,'update']); // هعمل انو ممكين يكنسل الرحله
route::delete('/activiy/booked/deleteBookedActivity',[BookedActivityController::class,'delete']); // soft delete
/////////////////////////////////////////////////////////////////////////////
route::get('/hotel',[HotelInfoController::class,'index']);
route::get('/hotel/createHotel',[HotelInfoController::class,'create']);
route::get('/hotel/updateHotel',[HotelInfoController::class,'update']);
route::get('/hotel/removeHotel',[HotelInfoController::class,'delete']);

// review Hotel

route::get('/hotel/review/{idHotel}',[ReviewHotelController::class,'index']);
route::post('/hotel/review/createReview',[ReviewHotelController::class,'create']);
route::delete('/hotel/review/delete/{id}',[ReviewHotelController::class,'delete']);

// rooms
//////////////////// done ///////////////////////////////////
route::get('/hotel/rooms',[RoomsController::class,'index']);
route::post('/hotel/rooms/insert',[RoomsController::class,'create']);
route::get('/hotel/rooms/update/{id}',[RoomsController::class,'edit']);
route::delete('/hotel/rooms/delete/{id}',[RoomsController::class,'destroy']);
//////////////////// done ///////////////////////////////////


