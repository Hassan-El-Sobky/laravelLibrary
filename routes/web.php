<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Cat;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cats',[CatController::class,'getCats'])->middleware('auth');
Route::get('/cats/{id}',[CatController::class,'show']);

Route::get('create/cat',[CatController::class,'create'])->middleware('auth');
Route::post('store/cat',[CatController::class,'store'])->middleware('auth');

Route::get('edit/cat/{id}',[CatController::class,'edit'])->middleware('auth');

Route::post('update/cat/{id}',[CatController::class,'update'])->middleware('auth');
Route::delete('/delete/cat/{id}',[CatController::class,'delete'])->middleware('auth');

Route::get('/latest/cat/{num}',[CatController::class,'latest']);
Route::get('/search/cat',[CatController::class,'search']);
 // BOOKS
Route::get('/books',[BookController::class,'getBooks']);
Route::get('create/book',[BookController::class,'create']);
Route::post('store/book',[BookController::class,'store']);
Route::get('/books/{id}',[BookController::class,'show']);

Route::get('/register',[AuthController::class,'registerForm'])->middleware('guest');
Route::post('/register',[AuthController::class,'register'])->middleware('guest');

Route::get('login',[AuthController::class,'loginForm'])->middleware('guest');
Route::post('login',[AuthController::class,'login'])->middleware('guest');

Route::get('/logout',[AuthController::class,'logout']);


Route::get('/users',[UserController::class,'index'])->middleware(['auth','isAdmin']);













// Route::get('/test',function(){
//     // SELECT * FROM CATS ;
//     //   $cats=Cat::all();
//     // $cats=Cat::findOrFail(1);
//     //   dd($cats);
//     //SELECT * FROM CATS WHERE ID >1;
//     //  $cats= Cat::where('id','>',1)->get();
//     //  dd($cats);
//     // SELECT * FROM CATS WHERE ID > 1 AND NAME <> science 
//     //  $cats=Cat::where('id','>',1)->where('name','<>','science')->get();
//     // dd($cats);
//   // SELECT * FROM CATS WHERE ID < 2 OR NAME = PROGRAMMING;
//     // $cats= Cat::where('id','<',2)->orWhere('name','=','science')->get();
//     // dd($cats);
//      // Select count(id) from cats
//     //  $count=Cat::avg('');
//     //  dd($count);
//     // SELECT * FROM CAT ORDERBY ID DESC LIMIT 2
//      $cats= Cat::orderBy('id','DESC')->take(1)->get();
     
//    foreach($cats as $cat)
//    {
//        echo $cat->name;

//    }
//       // Lastest Categories  /latest/cat/{2}  --> latest.balde.php

// });
