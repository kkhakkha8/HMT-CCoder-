<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Validation\Rule;


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
    public function subscriptionHandler (Blog $blog) {
        // if blog subscribed to blog
        if (User::find(auth()->id())->isSubscribed($blog)) {
            $blog->unSubscribe();
        } else {
            $blog->subscribe();
        }
        return back();

    }

    public function create() {
        // if(!auth()->check() || !auth()->user()->is_admin){
        //     abort(403);
        // }
        return view('blogs.create',[
            'categories'=>Category::all()
        ]);
    }

    public function store() {
        // $path = request()->file('thumbnail')->store('thumbnail');

       $formData = request()->validate([
        "title" => ['required'],
        "slug" => ['required',Rule::unique('blogs','slug')],
        "intro" => ['required'],
        "body" => ['required'],
        "category_id" => ['required',Rule::exists('categories','id')]
       ]);

       $formData['user_id'] = auth()->id();
       $formData['thumbnail'] = request()->file('thumbnail')->store('thumbnail');
       Blog::create($formData);

       return redirect('/');
    }
}
