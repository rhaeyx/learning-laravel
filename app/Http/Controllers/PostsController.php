<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();
        // $posts = Post::orderBy('created_at', 'desc')->take(1)->get();
        // $post = Post::where('title', 'Post Two')->get();
        // $posts = Post::orderBy('created_at', 'desc')->paginate(1);
        $posts = Post::orderBy('created_at', 'desc')->get();
        $title = 'Posts';
        return view('posts.index')->with(compact('title', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        # Create post
        # Add the user_id to the $request
        $request->merge( ['user_id' => Auth::user()->id] );
        # For each field in request, get it and save it to the table
        Post::create($request->all());
        # ^^^ Expanded version of this ^^^
        #$post = new Post;
        #$post->title = $request['title'];
        #$post->body = $request['body'];
        #$post->user_id = auth()->user()->id;
        #$post->save();

        return redirect('/posts')->with('success', 'Post created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with(compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with(compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        # Create post
        Post::find($id)->update($request->all())
        #$post = Post::find($id);
        #$post->title = $request['title'];
        #$post->body = $request['body'];
        #$post->save();

        return redirect('/posts')->with('success', 'Post updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        #$post = Post::find($id);
        #$post->delete();
        Post::find($id)->delete()
        return redirect('/posts')->with('success', 'Post deleted.');
    }
}
