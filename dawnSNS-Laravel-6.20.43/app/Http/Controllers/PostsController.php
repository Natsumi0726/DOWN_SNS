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
        $followCount = DB::table('follows')
            ->where('follower',Auth::id())
            ->count();
        $followerCount = DB::table('follows')
            ->where('follow',Auth::id())
            ->count();
        return view('posts.index',['posts'=>$posts, 'followCount'=>$followCount,'followerCount'=>$followerCount]);
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







    public function updateForm($id)
    {
        $post = DB::table('posts')
            ->where('id', $id)
            ->first();
        return view('posts.updateForm', compact('post'));
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        DB::table('posts')
            ->where('id', $id)
            ->update(
                ['post' => $up_post]
            );

        return redirect('/index');
    }

    public function delete($id)
    {
        DB::table('posts')
            ->where('id', $id)
            ->delete();
 
        return redirect('/top');
    }

}



?>