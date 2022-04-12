<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Http\Resources\CatResource;
use App\Models\Book;
use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    //

 

  public function allBooks()
  {
       $books=Book::all();
       return  BookResource::collection($books);
  }

  public function createCat(Request $request)
  {  // $request->validate([
     //      "name"=>'required|string|max:50',
     //      "desc"=>'required|string' ,
     //      "img"=>'required|image|max:1024|mimes:jgp,png,jpeg'
     //   ]);
     $validate=Validator::make($request->all(),[
                "name"=>'required|string|max:50',
          "desc"=>'required|string' ,
          "img"=>'required|image|max:1024|mimes:jgp,png,jpeg'
     ]);

     if($validate->fails())
     {
          return response()->json(['msg'=>$validate->errors()]);
     }

$imgPath=Storage::putFile('cats',$request->img);
     Cat::create([
         "name"=>$request->name,
         "desc"=>$request->desc,
         "img"=>$imgPath
     ]);

     return response()->json(['msg'=>'Category Created']);
  }

  public function updateCat($id,Request $request)
    {
     //    $request->validate([
     //        "name"=>'required|string|max:50',
     //        "desc"=>'required|string' 
     //     ]);
               
      $validate=Validator::make($request->all(),[
          "name"=>'required|string|max:50',
               "desc"=>'required|string',
               "img"=>'nullable|image|max:1024|mimes:png,jpg,jpeg'
      ]);
      if($validate->fails())
      {
           return response()->json(['msg'=>$validate->errors()]);
      }
            $cat= Cat::findOrFail($id);
            $imgPath=$cat->img; // el name bet3 el image el kan mawgod database dah esm el sora elkanet marfo3a abl kda
         if($request->hasFile('img'))
         {
             $imgPath=Storage::putFile('cats',$request->img);
         }
            
            $cat->update([
                  "name"=>$request->name,
                  "desc"=>$request->desc,
                  "img"=>$imgPath
             ]);

             return response()->json(['msg'=>"updated Successfully"]);
    }

    public function deleteCat($id)
    {
         $cat=Cat::find($id);

         if($cat)
         {      
              Storage::delete($cat->img);
              $cat->delete();
              return response()->json(['msg'=>"Delete Successfully"]);
         }
         return response()->json(['msg'=>"Cateory Not found"]);
    }

    public function showCat($id)
    {
     $cat=Cat::find($id);
     if($cat)
     {
          return $cat;
     }
     return response()->json(['msg'=>"Cateory Not found"]);
    }

}
