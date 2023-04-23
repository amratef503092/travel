<?php

namespace App\Http\Controllers;

use App\Http\Resources\ActivityResource;
use App\Http\Resources\ReviewResource;
use App\Models\Activity;
use App\Models\Category;
use App\Models\ReviewActivity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    use apiRsponseFormate;

    public function index()
    {
        //
        // $category =  Category ::all();
        $activity =  ActivityResource::collection(Activity::get());
        return $this->apiResponse($activity,"successfully" ,200) ;
        //   $activity =  ReviewResource::collection(ReviewActivity::get());
        //  return $activity  ;
    }
    public function create(Request $request)
    {
        $activity = new Activity();
        $activity ::create([
            "activityName"=>$request->activityName,
            "activityPrice"=>$request->activityPrice,
            "description"=>$request->description,
            "openTime"=>$request->openTime,
            "closeTime"=>$request->closeTime,
            "locationLang"=>$request->locationLang,
            "locationlatitude"=>$request->locationlatitude,
            "category_id"=>$request->category_id,

        ]);
        return  [
            "activity"=>$request,
        ];
    }
}
