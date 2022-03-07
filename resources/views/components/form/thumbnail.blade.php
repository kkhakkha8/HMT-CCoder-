@props(['name'])

<div class="mb-3">
    <label for="{{$name}}" class="form-label">Upload Img</label>
    <input type="file" name="{{$name}}" id="{{$name}}" class="form-control">
    <x-errors name="{{$name}}" />
  </div>
