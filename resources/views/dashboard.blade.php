@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <h1 class="card-header bg-primary text-white">
                    Dashboard
                </h1>
                <div class="card-body">
                    <h3 class="card-title">
                        <span>Your Blog Posts</span>
                            <a href="/posts/create" class="btn btn-primary float-right">Create Post</a>
                    </h3>
                    @if(count($posts) > 0)
                        <table class="table table-hover mt-4">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Last Modified</th>
                                <th>Actions</th>
                            </tr>
                            </thead>                            
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td><a href="/posts/{{$post->id}}">{{$post->title}}</a></td>
                                    <td>{!!Illuminate\Support\Str::limit($post->body, 45)!!}</td>
                                    <td>{{$post->created_at}}</td>
                                    <td>
                                        <a href="/posts/{{$post->id}}/edit" class="btn btn-outline-primary float-right">Edit</a>                                      
                                        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class'=>'float-right mr-2'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-outline-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>{{$posts->links()}}</td>
                            </tr>
                            </tbody>                                                        
                        </table>
                    @else
                        <p>You have no posts</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection