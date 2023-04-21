<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    //
    public function index()
    {
        //
        // $category =  Category ::all();
        $activity =  Activity ::get();
        return  $activity;
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
