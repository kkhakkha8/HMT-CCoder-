@props(['blog'])

<section class="container">
    <div class="col-md-8 mx-auto">
    <x-card-wrapper>
        <form action="/blog/{{$blog->slug}}/comments" method="POST">
            @csrf
            <div class="mb-3">
                <textarea class="form-control" name="body" id="" cols="10" rows="5" placeholder="Say Something...."></textarea>
            </div>
            <x-errors name="body" />
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </x-card-wrapper>
    </div>
</section>
