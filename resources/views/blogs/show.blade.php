
<x-layout>

        <!-- single blog section -->
        <div class="container">
            <div class="row">
              <div class="col-md-6 mx-auto text-center">
                <img
                  src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
                  class="card-img-top"
                  alt="..."
                />
                <h3 class="my-3">{{$blog->title}}</h3>
                <div>Author - <a href="/authors/{{$blog->author->username}}">{{$blog->author->name}}</a></div>
                <a href="/categories/{{$blog->category->slug}}"><div class="badge bg-primary">{{$blog->category->name}}</div></a>
                <div class="text-secondary">{{$blog->created_at->diffForHumans()}}</div>
                <div class="text-secondary">
                    <form action="/blog/{{$blog->slug}}/subscription" method="POST">
                        @csrf
                        @auth
                            @if(auth()->user()->isSubscribed($blog))
                            <button class="btn btn-danger">Unsubscribe</button>
                            @else
                            <button class="btn btn-warning">Subscribe</button>
                            @endif
                        @endauth
                    </form>
                </div>

                <p class="lh-md mt-3">
                  {{$blog->body}}
                </p>
              </div>
            </div>
          </div>
          {{-- Comment form section --}}
          @auth
          <x-comment-form :blog="$blog" />
            @else
            <p class="text-center">Please <a href="/login">login</a> to participate in discussion</p>
          @endauth


          {{-- comments section --}}
          @if ($blog->comments->count())
              <x-comments :comments="$blog->comments()->latest()->paginate(3)" />
          @endif

        <!-- subscribe new blogs -->

        <x-blog_you_may_like  :randomBlogs="$randomBlogs" />
</x-layout>


