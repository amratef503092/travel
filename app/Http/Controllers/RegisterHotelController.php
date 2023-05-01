<?php

namespace App\Http\Controllers;

use App\Models\hotels;
use Illuminate\Http\Request;

class RegisterHotelController extends Controller
{
    //
    public function register(Request $request)
    {

        $data = hotels::create($request->all());

        return $this->success([
            'data' => $data,
            'token' => $data->createToken('api-auth-token')->plainTextToken,
        ] ,'You are Registerd successfully');
    }
}
