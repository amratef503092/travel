<?php

namespace App\Http\Controllers;

use App\Models\ReviewActivity;
use App\Http\Requests\StoreReviewActivityRequest;
use App\Http\Requests\UpdateReviewActivityRequest;
use Illuminate\Http\Request;

class ReviewActivityController extends Controller
{
    use apiRsponseFormate;

    public function index($id)
    {
        //
       $reviewActivity =  ReviewActivity::where("activity_id" ,$id)->get();
       return $this->apiResponse($reviewActivity ,"successfuly" , 200);
    }


    public function create(Request $request )
    {
        //
        $reviewActivity =  ReviewActivity::create($request->all());
        return $this->apiResponse($reviewActivity , "create activity Successfuly " , 200);
    }
    public function getAllReview(Request $request )
    {
        //
        $reviewActivity =  ReviewActivity::get();
        return $this->apiResponse($reviewActivity , "create activity Successfuly " , 200);
    }


}
