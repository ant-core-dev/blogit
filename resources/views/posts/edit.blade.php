@extends('layouts.app');

@section('content')
<h1>Edit Post</h1>

    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
          {{Form::label('title', 'Title')}}
          {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' =>'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', $post->body, ['class' => ['form-control', 'ckeditor'], 'placeholder' =>'Body Text'])}}
        </div>
        <div class="form-group">
            <img style="width:50%" src="/storage/cover_images/{{$post->cover_image}}" alt="">
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>               
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        <a href="/posts" class="btn btn-outline-secondary">Cancel</a>
    {!! Form::close() !!}

    <script src="{{asset('/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>    
@endsection