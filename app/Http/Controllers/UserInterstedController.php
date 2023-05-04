<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserInterstedResource;
use App\Models\User_Intersted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserInterstedController extends Controller
{
    use apiRsponseFormate;
    //
    public function index()
    {
        $userIntersted = UserInterstedResource::collection(User_Intersted::get());
        return   $userIntersted;
    }
    public function getUserIntersted($id)
    // DB::table('user__intersteds')->where("userID" , $id)->get()
    {   $userIntersted = UserInterstedResource::collection(User_Intersted::where("userID" , $id)->get());
        if($userIntersted){
            return $this->apiResponse($userIntersted,"Successfuly" ,200);
        }
        return $this->apiResponse(null,"Not Found" ,404);
    }
    public function addUserInterstend(Request $request ,)
    {
       $values =  $request['id'];
       $userID = $request['userID'];
       foreach ($values as  $value)
        {
            $userIntersted = User_Intersted::create([
                "userID"=> $userID,
                "categoryId"=>$value,
            ]);
        }
    return    $this->apiResponse(
        $userIntersted ,
        "successfuly",
        201
    ) ;
    }
}
