<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\Api\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/movies',[MovieController::class,'index']);

// Route::get('/movie/{id}',[MovieController::class,'show']);


//Route::resource('movies',MovieController::class);
Route::resource('genres',GenreController::class);
Route::resource('directors',DirectorController::class);
Route::get('/director/{id}/movies',[DirectorController::class,'show'])->name('directors.movies.show');

Route::post('/register',[AuthController::class,'register']);

Route::post('/login',[AuthController::class,'login']);

Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::get('/profile',function(Request $request){
        return auth()-user();

    });
    Route::resource('movies',MovieController::class)->only(['update','store','destroy']);

    Route::post('/logout',[AuthController::class,'logout']);
});
Route::resource('movies',MovieController::class)->only(['index']);






