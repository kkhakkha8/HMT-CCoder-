@props(['name'])
<x-form.input-wrapper>
    <x-form.label :name="$name" />
    <textarea class="form-control" name="{{$name}}" id="{{$name}}" cols="30" rows="10">{{old($name)}}</textarea>
    <x-errors name="{{$name}}" />
</x-form.input-wrapper>
