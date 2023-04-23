<?php

namespace App\Http\Controllers;

use App\Models\ReviewActivity;
use App\Http\Requests\StoreReviewActivityRequest;
use App\Http\Requests\UpdateReviewActivityRequest;

class ReviewActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
