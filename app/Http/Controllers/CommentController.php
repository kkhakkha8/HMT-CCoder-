<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Mail\SubscriberMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    //
    public function store (Blog $blog)
    {
        request()->validate([
            'body'=>['required','min:3']
        ]);
        $blog->comments()->create([
            'body'=>request('body'),
            'user_id'=>auth()->user()->id
        ]);

        // mail

        $subscribers = $blog->subscribers->filter(function($subscriber){
                return $subscriber->id != auth()->id();
        });
        $subscribers->each(function ($subscriber) use($blog) {
            Mail::to($subscriber->email)->queue(new SubscriberMail($blog));
        });
        return redirect('/blog/'.$blog->slug);
    }
}
