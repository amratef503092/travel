<?php

namespace App\Http\Controllers;

use App\Models\Intersted;
use Illuminate\Http\Request;

class InterstedController extends Controller
{
    use apiRsponseFormate;
    //
    public function index()
    {
        $Intersted = Intersted::get();
      return  $this->apiResponse($Intersted , "successfuly" ,200);
    }
    public function create(Request $request)
    {
        $Intersted = Intersted::create(
            $request->all(),
        );
        return  $this->apiResponse($Intersted ,"successfuly",200);
    }
}
