<?php

namespace App\Http\Controllers;

use App\Http\Resources\ActivityResource;
use App\Models\Activity;
use App\Models\WishlistActivity;
use Illuminate\Http\Request;

class WishlistActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use apiRsponseFormate;
    public function index(Request $request)
    {
        $user = $request->user();
        $wishlist = $user->wishlistActivity()->get();

        return $this->apiResponse(
            ActivityResource::collection($wishlist->pluck('activity'))
            ,"successfuly" , 200
            );
    }

    public function addActivity(Request $request, $activity_id)
    {
        $user = $request->user();
        $activity = Activity::findOrFail($activity_id);
        $wishlist = $user->wishlistActivity()->where('activities_id', $activity_id)->first();
        if ($wishlist) {
            return $this->apiResponse(
               null
                ,"Activity already in wishlist" , 200
                );
        }
        $wishlist = WishlistActivity::
        create([
            'user_id' => $user->id,
            'activities_id' => $activity_id
        ]);
        return $this->apiResponse(
            new ActivityResource($activity)
            ,"Add Sucessful" , 200
            );
    }

    public function removeActivity(Request $request, $activity_id)
    {
        $user = $request->user();
        $wishlist = $user->wishlistActivity()->where('activities_id', $activity_id)->firstOrFail();
        $wishlist->delete();
        return response()->json(['message' => 'activitie removed from wishlist.']);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
