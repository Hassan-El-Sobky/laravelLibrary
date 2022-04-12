<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatController extends Controller
{
    public function getCats()
    {
         $cats=Cat::paginate(1);
      
        return view('Cats/cats',[
            'cats'=>$cats
        ]);
    }

    public function show($id)
    {  

        $cat=Cat::findOrFail($id);

          return view('Cats.show',[
              'cat'=>$cat
          ]);
    }

    public function create()
    {
        return view('Cats.create');
    }

    public function store(Request $request)
    {
          $request->validate([
             "name"=>'required|string|max:50',
             "desc"=>'required|string' ,
             "img"=>'required|image|max:1024|mimes:jgp,png,jpeg'
          ]);
 $imgPath=Storage::putFile('cats',$request->img);
        Cat::create([
            "name"=>$request->name,
            "desc"=>$request->desc,
            "img"=>$imgPath
        ]);
        return redirect(url('/cats'));
    }

    public function edit($id)
    {
          $cat=Cat::findOrFail($id);
        //  dd($cat);

        return view('Cats.edit',[
            "cat"=>$cat
        ]);
    }

    public function update($id,Request $request)
    {
        $request->validate([
            "name"=>'required|string|max:50',
            "desc"=>'required|string' 
         ]);
                   
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

             return redirect(url('cats'));
    }
    public function delete($id)
    {
         $cat=Cat::findOrFail($id);
            Storage::delete($cat->img);
         $cat->delete();
         return redirect(url('/cats'));
    }

    public function latest($num)
    {
          $cats=Cat::orderBy('id','DESC')->take($num)->get();
          return view('Cats.latest',[
              'num'=>$num,
              'cats'=>$cats
          ]);
    }

    public function search(Request $request)
    {
        $keyword= $request->keyword;
         $searchCats=Cat::where('name','like',"%$keyword%")->get();
          return view('Cats.search',[
              'cats'=>$searchCats,
              'keyword'=>$keyword
          ]);
    }

}
