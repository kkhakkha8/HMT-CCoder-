
@extends('layout')

@section('content')
    <h1>My Blogs</h1>
    
        @foreach($blogs as $blog)
        
            <div class="{{$loop->even ? 'bg-yellow' : ''}}">
                <h1><a href="<?= "blog/".$blog->slug ; ?>" ><?= $blog->title ;?></a></h1>
                <p>Published at - <?= $blog->date ?></p>
                <p><?= $blog->intro; ?></p>
            
            </div>
        @endforeach

@endsection