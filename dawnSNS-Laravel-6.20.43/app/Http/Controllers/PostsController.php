<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use \App\create;

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
    }
    public function create(Request $request)
    {
        $validator = $request->validate([
            'post' => ['required', 'string', 'max:280'],
        ]);
        post::create([
            'user_id' => Auth::user()->id,
            'post' => $request->post,
        ]);
        return back();
    }


}



?>