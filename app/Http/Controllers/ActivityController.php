<?php

namespace App\Http\Controllers;

use App\Http\Resources\ActivityResource;
use App\Http\Resources\ReviewResource;
use App\Models\Activity;
use App\Models\Category;
use App\Models\city;
use App\Models\hotels;
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
        $city =  city::find($request->city_id);

        if(!$city)
        {
            return $this->apiResponse(null,"city not found" ,404) ;
        }

        $hotels =  hotels::find($request->hotel_id);

        if(!$hotels)
        {
            return $this->apiResponse(null,"hotel not found" ,404) ;
        }

        $category =  Category::find($request->category_id);

        if(!$category)
        {
            return $this->apiResponse(null,"category not found" ,404) ;
        }

        $activity  =  $activity::create([
            "activityName" => $request->activityName,
            "activityPrice" => $request->activityPrice,
            "description" => $request->description,
            "openTime" => $request->openTime,
            "closeTime" => $request->closeTime,
            "location" =>$request->location,
            "category_id" => $request->category_id,
            "hotel_id" => $request->hotel_id,
            "city_id" => $request->city_id,
            "images" => $request->images,
        ]);
        return $this->apiResponse($activity ,"Successfuly",200);
    }
    public function update(Request $request , $id)
    {

        //
        // search id in data base
        // $category = Category::find($id);
        // $category = Category::where('id',$id);
        $activity = Activity::find($id);
        if(!$activity)
        {
            return $this->apiResponse(null , "Not found" , 404);
        }
        $activity->update($request->all());

        if($activity)
        {
            return $this->apiResponse($activity , "Update Succesfuly" , 200);
        }else
        {
            return $this->apiResponse(null , "Update Error" , 400);

        }
    }
    public function delete($id)
    {

        $activity = Activity::find($id);

        $activity->delete($id);
        return $this->apiResponse($activity , "Delete Succesfuly" , 200);

    }

}
