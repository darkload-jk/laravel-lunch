<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | contains the "web" middleware group. Now create something great!
// |
// */

Auth::routes();
// creatre a new post->submit->middleware:Chck requests 'logged in?'->save to db(yes)/create a new post(no)
Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/post/create',[PostController::class, 'create'])->name('create');
    Route::post('/post/store',[PostController::class,'store'])->name('store');
});

