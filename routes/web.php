<?php

use App\Http\Controllers\BlogController;

use App\Models\User;

use Illuminate\Support\Facades\Route;
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


Route::get('/authors/{author:username}',function(User $author){

    //return view('blogs',['blogs'=>$author->blogs]) ;
    return view('blogs',[
        // 'blogs'=>$author->blogs->load('author','category')
        'blogs'=>$author->blogs

        ]) ;
});
