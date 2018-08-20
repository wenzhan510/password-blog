<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\Reply;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);

    }

    public function create()
    {
        return view('posts.create');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required|max:1000',
            'password' => 'string|max:255',
        ]);
        Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'body' => $request->body,
            'password' => $request->password,
        ]);
        return redirect()->route('home')->with('status','您已成功发布博文');
    }

    public function update(Post $post, Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required|max:1000',
            'password' => 'string|max:255',
        ]);
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'password' => $request->password,
        ]);

        return redirect()->route('home')->with('status','您已成功修改博文');
    }

    public function show(Post $post)
    {
        if((!Auth::check())||(Auth::id()!==$post->user_id)){
            return redirect()->route('post.password', $post);
        }else{
            $replies = $post->replies()->paginate(5);
            return view('posts.show', compact('post','replies'));
        }
    }

    public function password(Post $post)
    {
        return view('posts.password', compact('post'));
    }

    public function passwordlogin(Post $post, Request $request)
    {
        if($request->password===$post->password){
            $replies = $post->replies()->paginate(5);
            return view('posts.show', compact('post','replies'));
        }else{
            return redirect()->route('post.password', $post);
        }
    }
}
