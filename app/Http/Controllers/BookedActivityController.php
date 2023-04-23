<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookedActivityResource;
use App\Models\BookedActivity;
use Illuminate\Http\Request;

class BookedActivityController extends Controller
{
    use apiRsponseFormate;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $bookedActivity = BookedActivityResource::collection(BookedActivity::get());
        return  $this->apiResponse($bookedActivity , "Successfully" , 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
     * @param  \App\Models\BookedActivity  $bookedActivity
     * @return \Illuminate\Http\Response
     */
    public function show(BookedActivity $bookedActivity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookedActivity  $bookedActivity
     * @return \Illuminate\Http\Response
     */
    public function edit(BookedActivity $bookedActivity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookedActivity  $bookedActivity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookedActivity $bookedActivity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookedActivity  $bookedActivity
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookedActivity $bookedActivity)
    {
        //
    }
}
