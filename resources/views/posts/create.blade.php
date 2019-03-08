@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>    
    <form action="{{action('PostsController@store')}}" method="POST">
       <div class="form-group">
        <label for="title">Title</label>
       <input class="form-control" type="text" name="title" placeholder="Title">
     </div>
     <div class="form-group">
         <label for="body">Body</label>
          <textarea class="form-control" type="text" name="body" placeholder="Content"></textarea>
      </div>
      {{ csrf_field() }}
      <input class="btn btn-primary" type="submit">
    </form>
@endsection