<?php

use App\Models\User;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use function PHPUnit\Framework\fileExists;



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


Route::get('/', [BlogController::class,'index']);

Route::get("/blog/{blog:slug}",[BlogController::class,'show']); // whereAlphaNumeric->('blog')

Route::get('/register',[AuthController::class,'create'])->middleware('guest');

Route::post('/register',[AuthController::class,'store'])->middleware('guest');

Route::post('/logout',[AuthController::class,'logout'])->middleware('auth');

Route::get('/login',[AuthController::class,'login'])->middleware('guest');

Route::post('/login',[AuthController::class,'post_login'])->middleware('guest');
// all  ->  index  -> blogs.index
//single  -> show  ->blogs.show
//form  -> create  ->blogs.create
//data store  -> store  -> store to db
//edit form -> edit  -> blogs.edit
//server update -> update  ->
//server delete -> destory
