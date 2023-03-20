<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use \App\create;
use App\Post;

class PostsController extends Controller
{
    //

    public function index(){
        $posts = DB::table('posts')->get();
        return view('posts.index',['posts'=>$posts]);
    }

    public function createForm()
    {
        $tweets = posts::latest()->get();
        return view('auth.createForm',compact('posts'));
        return view('posts.createForm');
    }
    public function create(Request $request)
    {
        $validator = $request->validate([
            'newPost' => ['required', 'string', 'max:280'],
        ]);
        Post::create([
            'user_id' => Auth::user()->id,
            'posts' => $request->newPost,
        ]);
        return back();
    }


}



?>