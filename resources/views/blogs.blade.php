<!-- 
<x-navbar></x-navbar>
<x-layout>
    <x-slot name='title'>
        <title>All Blogs</title>
    </x-slot>
    <x-slot name='content'>
        <h1>My Blogs</h1>
        @foreach($blogs as $blog)
        
            <div>
                
                <h1><a href=" {{"blog/".$blog->slug}}" >{{$blog->title}}</a></h1>
                <p>
                    <h4>Author - <a href="/authors/{{$blog->author->username}}">{{$blog->author->name}}</h4></a>
                </p>
                <p>
                    <a href="{{"/categories/".$blog->category->slug}}"> {{$blog->category->name}}</a>
                </p>
                <p>Published at - {{$blog->created_at->diffForHumans()}}</p>
                <p>{{$blog->intro}}</p>
            </div>
        @endforeach
    </x-slot>
</x-layout>    -->


  <x-layout>
    <x-navbar></x-navbar>
    <x-hero />
    <x-blog-section />
    <x-subscribe />
</x-layout>


 
   


