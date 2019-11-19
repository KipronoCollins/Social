<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //

    public function postCreatePost(Request $request)
    {
        //validation

        $this->validate(
            $request,
            [
                'body' => 'required|max:1000'
            ]
        );

        $post = new Post();
        $post->body = $request->body;
        
        if($request->user()->posts()->save($post))
        {
            $message = 'Post Succesfully Created';
        }
        else
        {
            $message = 'There was an error creating the post';
        }
        return redirect()->route('dashboard')->with('message', $message);
    }

    public function getDashboard()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('dashboard', ['posts' => $posts]);
    }

    public function getDeletePost($post_id)
    {
        $post = Post::where('id', $post_id)->first();

        if(Auth::user() != $post->user)
        {
            return redirect()->back();
        }

        $post->delete();
        return redirect()->route('dashboard')->with(['message' => 'Succesfully deleted']);
    }
}
