<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReviewHotelResource;
use App\Models\ReviewHotel;
use Illuminate\Http\Request;

class ReviewHotelController extends Controller
{
    use apiRsponseFormate;
    //
    public function index($idHotel)
    {
        //
        return ReviewHotelResource::collection(ReviewHotel::where("Hotel_id" , $idHotel)->get());
    }
    public function create(Request $request)
    {
        //

        $createReview = ReviewHotel::create($request->all());

        return $this->apiResponse(new ReviewHotelResource($createReview), "create review in hotel successfuly",
        200);
    }
    public function delete( $id)
    {
        //

        $createReview = ReviewHotel::find($id);
        $createReview->delete();
        return $this->apiResponse(null, "delete review in hotel successfuly",
        200
    );
    }

}
