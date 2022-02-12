
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

                <p class="lh-md mt-3">
                  {{$blog->body}}
                </p>
              </div>
            </div>
          </div>
          {{-- Comment form section --}}
          @auth
            <section class="container">
                <div class="col-md-8 mx-auto">
                <x-card-wrapper>
                    <form action="/blog/{{$blog->slug}}/comments" method="POST">
                        @csrf
                        <div class="mb-3">
                            <textarea class="form-control" name="body" id="" cols="10" rows="5" placeholder="Say Something...."></textarea>
                        </div>
                        @error('body')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </x-card-wrapper>
                </div>
            </section>
            @else
            <p class="text-center">Please <a href="/login">login</a> to participate in discussion</p>
          @endauth


          {{-- comments section --}}
        <x-comments :comments="$blog->comments" />
        <!-- subscribe new blogs -->
        <x-subscribe />
        <x-blog_you_may_like  :randomBlogs="$randomBlogs" />
</x-layout>


