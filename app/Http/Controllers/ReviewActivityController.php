<?php

namespace App\Http\Controllers;

use App\Models\ReviewActivity;
use App\Http\Requests\StoreReviewActivityRequest;
use App\Http\Requests\UpdateReviewActivityRequest;
use Illuminate\Http\Request;

class ReviewActivityController extends Controller
{
    use apiRsponseFormate;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
       $reviewActivity =  ReviewActivity::where("activity_id" ,$id)->get();
       return $this->apiResponse($reviewActivity ,"successfuly" , 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request )
    {
        //
        $reviewActivity =  ReviewActivity::create($request->all());
        return $this->apiResponse($reviewActivity , "create activity Successfuly " , 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReviewActivityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReviewActivityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReviewActivity  $reviewActivity
     * @return \Illuminate\Http\Response
     */
    public function show(ReviewActivity $reviewActivity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReviewActivity  $reviewActivity
     * @return \Illuminate\Http\Response
     */
    public function edit(ReviewActivity $reviewActivity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReviewActivityRequest  $request
     * @param  \App\Models\ReviewActivity  $reviewActivity
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReviewActivityRequest $request, ReviewActivity $reviewActivity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReviewActivity  $reviewActivity
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReviewActivity $reviewActivity)
    {
        //
    }
}
