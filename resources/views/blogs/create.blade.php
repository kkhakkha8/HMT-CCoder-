

<x-layout>

<h3 class="my-3 text-center">Create Blog Form</h3>
<div class="col-md-8 mx-auto">
    <x-card-wrapper>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
              <x-form.input name="title" />
              <x-form.input name="slug" />
              <x-form.input name="intro" />

              <x-form.textarea name="body" />
              <x-form.input name="thumbnail" type="file" />

              <x-form.input-wrapper>
                  <x-form.label name="category" />
                  <select name="category_id" id="Category" class="form-control">
                      @foreach ($categories as $category)
                            <option {{$category->id == old('category_id') ? 'selected': '' }} value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                  </select>
                  <x-errors name="category_id" />
              </x-form.input-wrapper>
              <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success mt-3">Post Now</button>
              </div>

        </form>
    </x-card-wrapper>
</div>
</x-layout>
