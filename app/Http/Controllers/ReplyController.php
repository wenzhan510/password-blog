<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Reply;

class ReplyController extends Controller
{
    public function store(Post $post, Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'body' => 'required|max:1000',
        ]);
        Reply::create([
            'name' => $request->name,
            'body' => $request->body,
            'post_id' => $post->id,
        ]);
        return redirect()->back()->with('status','您已成功发布留言');
    }
}
