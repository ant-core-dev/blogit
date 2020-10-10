@extends('layouts.app');

@section('content')
    <h1>Posts</h1>
    @if(count($posts)>0)
        @foreach ($posts as $post)
            <div class="card p-3">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        @if($post->cover_image)
                            <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}" alt="">
                        @else 
                            <img style="width:100%" src="/storage/cover_images/noimage.jpg" alt="">
                        @endif
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                        <p>{!!$post->body!!}</p>
                        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                    </div>
                </div>
            </div>
            
        @endforeach
        {{$posts->links()}}
    @else
        <p>No Posts Found!</p>
    @endif
@endsection()