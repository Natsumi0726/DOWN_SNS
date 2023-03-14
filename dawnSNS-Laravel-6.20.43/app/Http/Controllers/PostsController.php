<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
            'posts' => $post,
            'user_id' => Auth::id,
            //Undefined class constant 'id'
        ]);

        return redirect('/top');
    }
    public function delete($id)
{
    DB::table('posts')
        ->where('id', $id)
        ->delete();

    return redirect('/index');
}

}



?>