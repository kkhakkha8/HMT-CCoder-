@props(['name','type'=>'text'])

<x-form.input-wrapper>
    <x-form.label :name="$name" />
    <input
    id="{{$name}}"
    type="{{$type}}"
    class="form-control"
    name = "{{$name}}"
    value="{{old($name)}}"
    required
    >
    <x-errors :name="$name" />
</x-form.input-wrapper>
