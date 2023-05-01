<?php

namespace App\Http\Controllers;

use App\Models\hotels;
use Illuminate\Http\Request;

class RegisterHotelController extends Controller
{
    //
    use apiRsponseFormate;
    public function register(Request $request)
    {

        $data = hotels::create($request->all());

        return $this->apiResponse(
            $data,
            'successfuly',
            200
        );
    }
}
