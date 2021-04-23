<?php

use App\Http\Controllers\FollowsController;
use App\Http\Controllers\TweetsController;
use App\Http\Controllers\ProfilesController;
use Illuminate\Support\Facades\Route;

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
Route::middleware('auth')->group(function(){

    Route::get('/tweets',[TweetsController::class,'index'])->name('home');
    Route::post('/tweets',[TweetsController::class,'store']);
    Route::get('/profiles/{user:name}/edit',[ProfilesController::class,'edit']);
    Route::post('/profiles/{user:name}/follows',[FollowsController::class,'store']);

});
Route::get('/profiles/{user:name}',[ProfilesController::class, 'show'])->name('profile');


Auth::routes();

