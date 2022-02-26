

<x-layout>

<h3 class="my-3 text-center">Create Blog Form</h3>
<div class="col-md-8 mx-auto">
    <x-card-wrapper>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text"
                class="form-control"
                for='title'
                name = 'title'
                value='{{old('title')}}'
                required
                >
                <x-errors name="title" />
              </div>
              <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text"
                class="form-control"
                for='slug'
                name = 'slug'
                value='{{old('slug')}}'
                required
                >
                <x-errors name="slug" />
              </div>
              <div class="mb-3">
                <label for="intro" class="form-label">Intro</label>
                <input type="text"
                class="form-control"
                for='intro'
                name = 'intro'
                value='{{old('intro')}}'
                required
                >
                <x-errors name="intro" />
              </div>
              <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <textarea class="form-control" name="body" id="body" cols="30" rows="10">{{old('body')}}</textarea>
                <x-errors name="body" />
              </div>
              <div class="mb-3">
                <label for="thumbnail" class="form-label">Upload Img</label>
                <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                <x-errors name="thumbnail" />
              </div>

              <div class="mb-3">
                  <label for="Category" class="form-label">Category</label>
                  <select name="category_id" id="Category" class="form-control">
                      @foreach ($categories as $category)
                            <option {{$category->id == old('category_id') ? 'selected': '' }} value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                  </select>
                  <x-errors name="category_id" />
              <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success mt-3">Post Now</button>
              </div>

        </form>
    </x-card-wrapper>
</div>
</x-layout>
