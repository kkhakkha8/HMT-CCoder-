
  <x-layout>
    <x-navbar></x-navbar>
    <x-hero />
    <x-blog-section :blogs="$blogs" :categories="$categories" :currentCategory="$currentCategory ?? null" />
    <x-subscribe />
</x-layout>






