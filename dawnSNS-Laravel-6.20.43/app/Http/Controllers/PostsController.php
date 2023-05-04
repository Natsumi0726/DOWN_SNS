<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use \App\create;
use App\Post;

class PostsController extends Controller
{
  

    public function index(){
        $posts = DB::table('posts')
        ->join('users', 'posts.user_id','=', 'users.id')
        ->leftJoin('follows', 'posts.user_id','=', 'follows.follow')
        ->where('follower',Auth::id())
        ->orWhere('user_id',Auth::id())
        ->select('posts.user_id','posts.posts','posts.id','posts.created_at','users.username','users.images',)
        ->get()->sortByDesc('created_at');;
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
            'newPost' => ['required', 'string', 'max:5'
        ],[
            'newPost.max' => '150文字以内で投稿してください',
            ]]);

        Post::create([
            'user_id' => Auth::user()->id,
            'posts' => $request->newPost,
        ]);
        return back();
    }

    public function update(Request $request)
    {
        $validator = $request->validate([
            'upPosts' => ['required', 'string', 'max:150'
        ],[
            'upPosts.max' => '150文字以内で編集してください',
            ]]);


        $id = $request->input('id');
        $up_posts = $request->input('upPosts');
        DB::table('posts')
            ->where('id', $id)
            ->update(
                ['posts' => $up_posts]
            );

        return redirect('/top');
    }

    public function delete($id)
    {
        DB::table('posts')
            ->where('id', $id)
            ->delete();
 
        return redirect('/top');
    }
  public function __construct()
    {
        $this->middleware('auth');
    }
}



?>