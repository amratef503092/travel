<?php

namespace App\Http\Controllers;

use App\Http\Resources\HotelInfoResource;
use App\Models\HotelInfo;
use App\Models\WishlistHotel;
use Illuminate\Http\Request;

class WishlistHotelController extends Controller
{

    use apiRsponseFormate;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $wishlist = $user->wishlistHotel()->get();

        return $this->apiResponse(
            HotelInfoResource::collection($wishlist->pluck('hotelInfo'))
            ,"successfuly" , 200
            );
    }

    public function addHotel(Request $request, $hotel_id)
    {
        $user = $request->user();
        $hotelInfo = HotelInfo::findOrFail($hotel_id);
        $wishlist = $user->wishlistHotel()->where('hotel_info_id', $hotel_id)->first();
        if ($wishlist) {
            return $this->apiResponse(
               null
                ,"Hotel already in wishlist" , 200
                );
        }
        $wishlist = WishlistHotel::
        create([
            'user_id' => $user->id,
            'hotel_info_id' => $hotel_id
        ]);
        return $this->apiResponse(
            new HotelInfoResource($hotelInfo)
            ,"Add Sucessful" , 200
            );
    }

    public function removeHotel(Request $request, $hotel_id)
    {
        $user = $request->user();
        $wishlist = $user->wishlistHotel()->where('hotel_info_id', $hotel_id)->firstOrFail();
        $wishlist->delete();
        return response()->json(['message' => 'Hotel removed from wishlist.']);
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
