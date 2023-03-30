<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class FollowsController extends Controller
{
    public function follow(){
    // $follow = DB::create([
    //     'follow' => \Auth::user()->id,
    //     'follower' => $user->id,
    // ]);
    // $followCount = count(DB::where('follow', $user->id)->get());
    // return response()->json(['followCount' => $followCount]);

    return back ();
}

public function unfollow(){


    return back ();
}

    public function followerList(){
        $followers = DB::table('follows')
            ->join('users', 'follows.follower','users.id')
            ->where('follow',Auth::id())
            ->select('follows.follow', 'users.username', 'users.images')
            ->get();
        return view('follows.followerList',compact('followers'));
    }

    public function followList(){
        $follows = DB::table('follows')
            ->join('users', 'follows.follow','users.id')
            ->where('follower',Auth::id())
            ->select('follows.follower', 'users.username', 'users.images')
            ->get();
        return view('follows.followList',compact('follows'));
    }
}
