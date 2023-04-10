<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{

    /**
     * ユーザー一覧
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function search(Request $request)
    {
        $followCount = DB::table('follows')
            ->where('follower',Auth::id())
            ->count();
            $followerCount = DB::table('follows')
            ->where('follow',Auth::id())
            ->count();
        $search = $request->search;
       // もし検索フォームにキーワードが入力されたら
        if (isset($search)){
            $users = DB::table('users')
            ->where('username','like',"%".$search."%")
            ->select('images','username','id')
            ->get();
        }else{
            $users = DB::table('users')
            ->select('images','username','id')
            ->get();
        }
        $followers = DB::table('follows')
        ->where('follower',Auth::id())
        ->pluck('follow');
        // ビューにusersとsearchを変数として渡す
        return view('users.search', [
            'users' => $users,
            'search' => $search,
            'followCount'=>$followCount,
            'followerCount'=>$followerCount,
            'followers'=>$followers
        ]);
    }

    public function profile()
    {

 dd();

    }
}