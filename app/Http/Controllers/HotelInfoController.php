<?php

namespace App\Http\Controllers;

use App\Http\Resources\HotelInfoResource;
use App\Models\HotelInfo;
use App\Models\ReviewHotel;
use Illuminate\Http\Request;

class HotelInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use apiRsponseFormate;
    public function index()
    {
        //
        $hotelInfo = HotelInfo::get();
        return HotelInfoResource::collection($hotelInfo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(
        Request $request,
    )
    {
        $hotelInfo = HotelInfo::create($request->all());
        return $this->apiResponse($hotelInfo ,"successfuly" , 200);
        //
    }
    public function update(
        Request $request,
    )
    {
        $hotel = HotelInfo::find($request->id);
        $hotel = $hotel->update($request->all());
        return $this->apiResponse($hotel ,"successfuly" , 200);
        //
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
     * @param  \App\Models\HotelInfo  $hotelInfo
     * @return \Illuminate\Http\Response
     */
    public function show(HotelInfo $hotelInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HotelInfo  $hotelInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(HotelInfo $hotelInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HotelInfo  $hotelInfo
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HotelInfo  $hotelInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $hotelInfo = HotelInfo::find($id);
        $hotelInfo->delete();
        return $this->apiResponse($hotelInfo ,"successfuly" , 200);
    }
}
