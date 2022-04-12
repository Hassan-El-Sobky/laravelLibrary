<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//  


Route::middleware(['jwt.verify'])->group(function(){
    Route::get('/books',[ApiController::class,'allBooks']);
    Route::post('/createCat',[ApiController::class,'createCat']);
    Route::post('/updateCat/{id}',[ApiController::class,'updateCat']);
    Route::delete('/deleteCat/{id}',[ApiController::class,'deleteCat']);
    Route::get('catDetails/{id}',[ApiController::class,'showCat']);    
});



Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});
