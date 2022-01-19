<?php

namespace App\Http\Controllers;

use App\Models\Blog;


class BlogController extends Controller
{
    //
    public function index(){
        //return view('blogs',['blogs'=> Blog::all()]);
        return view('blogs.index',[
            'blogs'=> Blog::latest()
                        ->filter(request(['search','category','username']))
                        ->paginate(6)
                        ->withQueryString()

        ]);
    }
    public function show(Blog $blog){
        return view('blogs.show',[
            // 'blog'=> Blog::find($slug)
            'blog'=>$blog,
            'randomBlogs'=>Blog::inRandomOrder()->take(3)->get()
        ]);
    }

    protected function getBlogs(){
        //$blogs = Blog::with('category','author')->latest();
        $query = Blog::latest()->filter()->get();
        // if($search){
        //     $blogs = $blogs->where('title','LIKE','%' .$search. '%')
        //                     ->orWhere('body','LIKE','%' .$search. '%');
        // }

        //When method
        // $query->when(request('search'),function($query,$search){
        //     $query->where('title','LIKE','%' .$search. '%')
        //           ->orWhere('body','LIKE','%' .$search. '%');
        // });

        // return $query->get();
        return $query;
    }
}
