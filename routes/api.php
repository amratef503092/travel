<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookedActivityController;
use App\Http\Controllers\BookingRoomController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\HotelInfoController;
use App\Http\Controllers\InterstedController;
use App\Http\Controllers\LoginHotelController;
use App\Http\Controllers\ReviewActivityController;
use App\Http\Controllers\ReviewHotelController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\UserInterstedController;
use App\Http\Controllers\VerifyEmailController;
use App\Mail\SendEmail;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\NewPasswordController;

use App\Http\Controllers\CityController;

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
route::post('/email/otp',[VerifyEmailController::class,'sendVerifyEmail']);

// Admin Routes
// Route::post('/register',[RegisterController::class, 'register']);
// Route::post('/login',[LoginController::class, 'login']);
// Route::post('/verification-notification', [EmailVerficationController::class, 'sendVerficationEmail'])->middleware('auth:sanctum');
// Route::get('verify-email/{id}/{hash}', [EmailVerficationController::class, 'verify'])->name('verification.verify');
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
route::post('/Interstecreated',[InterstedController::class,'create']);
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
// review activity
route::get('review/activiy/{id}',[ReviewActivityController::class,'index']);
route::get('review/activiy',[ReviewActivityController::class,'getAllReview']);

route::post('review/activiy/insert',[ReviewActivityController::class,'create']);
route::put('review/activiy/update/{id}',[ReviewActivityController::class,'update']);
route::delete('review/activiy/delete/{id}',[ReviewActivityController::class,'destroy']);


// booked
route::get('/activiy/booked',[BookedActivityController::class,'index']);
route::get('/activiy/booked/{id}',[BookedActivityController::class,'getById']);
route::post('/activiy/booked/bookActivity',[BookedActivityController::class,'bookedActivity']);
route::put('/activiy/booked/updateActivity',[BookedActivityController::class,'update']); // هعمل انو ممكين يكنسل الرحله
route::delete('/activiy/booked/deleteBookedActivity',[BookedActivityController::class,'delete']); // soft delete
/////////////////////////////////////////////////////////////////////////////
route::get('/hotel',[HotelInfoController::class,'index']);
route::post('/hotel/createHotel',[HotelInfoController::class,'create']);
route::put('/hotel/updateHotel',[HotelInfoController::class,'update']);
route::delete('/hotel/removeHotel/{id}',[HotelInfoController::class,'destroy']);

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


// send Email
route::get('send/Email',
function (){

Mail::to("amr.atef503092@gmail.com")->send(new SendEmail());
return "Email Send";
});

// booking Room
route::get('/hotel/rooms/booked',[BookingRoomController::class,'index']);
route::get('/hotel/rooms/getBookingRoomById/{id}',[BookingRoomController::class,'getBookingRoomById']);
route::get('/hotel/rooms/getBookingRoomByUser/{id}',[BookingRoomController::class,'getBookingRoomByUserId']);
route::post('/hotel/rooms/getBookingRoombyHotelID',[BookingRoomController::class,'getBookingRoombyHotelID']);
route::post('/hotel/rooms/createBookingRoom',[BookingRoomController::class,'createBookingRoom']);
route::post('/hotel/rooms/bookRoomID',[BookingRoomController::class,'getBookingRoombyRoomID']);

// verify Email
route::post('/email/verify',[VerifyEmailController::class,'verifyEmail']);

// send  otp to email reset Password
route::post('/password/sendotp',[ForgetPasswordController::class,'sendOtp']);
route::post('/password/verifyotp',[ForgetPasswordController::class,'verifyOtp']);
// route::post('/password/resetpassword',[ForgetPasswordController::class,'resetPassword']);

