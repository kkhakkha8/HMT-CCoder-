<x-navbar></x-navbar>
<x-layout>
    <x-slot name='title'>
        <title>{{$blog->title}}</title>
    </x-slot>
    <x-slot name='content'>
    <h1>{{$blog->title}}</h1>
    <p>{{$blog->body}}</p>
    <a href="/">go back</a>
    </x-slot>
</x-layout>


