<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);
        $post = new Post();
        $post->body = $request['body'];
        if ($request->user()->posts()->save($post)) {
            $message = "Posy have been created succesfully";

            return redirect()->route('home')->with(['message' => $message]);
        }
        return "someting horrible happened!!";
    }
    public function allposts()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('allposts', ['posts' => $posts]);
    }
    public function getDeletePost($post_id)
    {
        $post = Post::where('id', $post_id)->first();
        if (Auth::user() != $post->user) {
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('allposts')->with(['message' => 'Deleted successfully!']);
    }
}
