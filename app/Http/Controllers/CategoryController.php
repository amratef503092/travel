<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    use apiRsponseFormate;
    public function index()
    {
        //
        // $category =  Category ::all();
        $category =  Category ::get();

        return $this->apiResponse($category , "successfuly" , 200);
    }
    public function create(Request $request)
    {
        //
        $category = new Category();
        // $category->name = $request->name;
        // $category->save();
        // $data = array(
        //     'message' => 'Sucessfuly',
        //     'stutus code' => '200',
        //     'id' =>$category->id,
        //     'name'=>$category->name,
        //   );
         $category =  $category::create([
            'name' =>$request->name
          ]);
        return  $this->apiResponse($category , "successfuly" , 200);

    }
    public function update(Request $request)
    {

        //
        // search id in data base
        // $category = Category::find($id);
        // $category = Category::where('id',$id);
        $category = Category::find($request->id);
        $category->name = $request->name;
        $result=$category->save();
        return $this->apiResponse($result , "successfully" , 200);


    }
    public function delete($id)
    {
        //
        // search id in data base
        // $category = Category::find($id);
        // $category = Category::where('id',$id);
        $category = Category::findorFail($id)->delete();

        return ["result"=>"record is deleted"];


    }
}
