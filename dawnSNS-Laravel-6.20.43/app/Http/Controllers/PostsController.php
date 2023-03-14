<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    //

    public function index(){
        $posts = DB::table('posts')->get();
        return view('posts.index',['posts'=>$posts]);
    }

    public function createForm()
    {
        return view('posts.createForm');
    }
    public function create(Request $request)
    {
        $post = $request->input('newPost');
        DB::table('posts')->insert([
            'posts' => $post
            'user_id' => $user_id
            //users_idをどうやってもってくるのか
        ]);

        return redirect('/top');
    }
}
