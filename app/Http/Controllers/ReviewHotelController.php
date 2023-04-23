<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReviewHotelResource;
use App\Models\ReviewHotel;
use Illuminate\Http\Request;

class ReviewHotelController extends Controller
{
    //
    public function index()
    {
        //

        return ReviewHotelResource::collection(ReviewHotel::get());
    }
}
