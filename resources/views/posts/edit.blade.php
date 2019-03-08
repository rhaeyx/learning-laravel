@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>    
    <form action="{{action('PostsController@update', $post->id)}}" method="POST">
       <div class="form-group">
        <label for="title">Title</label>
       <input class="form-control" type="text" name="title" placeholder="Title" value="{{$post['title']}}">
     </div>
     <div class="form-group">
        <label for="body">Body</label>
        <textarea class="form-control" type="text" name="body" placeholder="Content">{{$post['body']}}</textarea>
      </div>
      <input type="hidden" name="_method" value="PUT">
      {{ csrf_field() }}
      <input class="btn btn-primary" type="submit"></button> 
    </form>
@endsection