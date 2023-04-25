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
        $activity  =  $activity ::create($request->all());
        return $this->apiResponse($activity ,"Successfuly",200);
    }
    public function update(Request $request , $id)
    {

        //
        // search id in data base
        // $category = Category::find($id);
        // $category = Category::where('id',$id);
        $activity = Activity::find($id);
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
        return ["result"=>"record is deleted"];

    }

}
