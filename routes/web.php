<?php

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
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

Route::get('/welcome', function () {

    return view('welcome');
});

Route::get('/', function () {

    //return view('blogs',['blogs'=> Blog::all()]);
    return view('blogs',[
        'blogs'=> Blog::with('category','author')->latest()->get(),
        'categories'=>Category::all(),


    ]);
});

Route::get("/blog/{blog:slug}",function(Blog $blog){
    return view('blog',[
        // 'blog'=> Blog::find($slug)
        'blog'=>$blog,
        'randomBlogs'=>Blog::inRandomOrder()->take(3)->get()
    ]);
})->where('blog','[A-z0-9\-\@]+'); // whereAlphaNumeric->('blog')

Route::get('/categories/{category:slug}',function(Category $category){
   // $blogs = $category->blogs;
    return view('blogs',[
        'blogs'=> $category->blogs->load('author','category'),
        'categories'=>Category::all(),
        'currentCategory'=>$category
    ]);
});

Route::get('/authors/{author:username}',function(User $author){

    //return view('blogs',['blogs'=>$author->blogs]) ;
    return view('blogs',[
        'blogs'=>$author->blogs->load('author','category'),
        'categories'=>Category::all()
        ]) ;
});
