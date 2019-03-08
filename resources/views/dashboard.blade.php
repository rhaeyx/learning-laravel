@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <a class="btn btn-primary" href="/posts/create">Create post.</a>
                    <h3>Your blog posts.</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
