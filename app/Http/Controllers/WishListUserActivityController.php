<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishListUserActivityController extends Controller
{
    //
    public function addInFavorite(Request $request)
    {
        $user = $request->user();
        $user->activity()->attach($request->activity_id);
        return response()->json([
            "message" => "activity added successfully"
        ]);
    }
}
