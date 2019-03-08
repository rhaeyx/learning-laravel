@extends('layouts.app')

@section('content')
    <a class='btn btn-primary' href="/posts">Go back</a>
    <h1>{{$post->title}}</h1>
    <div class="">
        {{$post->body}}
    </div>
    <hr>
    <small>Written at {{$post->created_at}}</small>
    <hr>
    <a class="btn btn-primary" href="/posts/{{$post->id}}/edit">Edit</a>

    <form action="{{action('PostsController@destroy', $post->id)}}" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        {{ csrf_field() }}
        <input class="btn btn-danger float-right" type="submit" value="Delete">
    </form>
@endsection