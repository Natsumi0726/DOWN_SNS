<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class FollowsController extends Controller
{
    public function follow(Request $request){
     $follow = $request->input('follow');
     DB::table('follows')->insert([
         'follow' => $follow,
         'follower' => \Auth::user()->id,
     ]);
    //  $followCount = count(DB::where('follow', $user->id)->get());
    //  return response()->json(['followCount' => $followCount]);

    return back ();
}


public function unfollow(Request $request){
    $unfollow = DB::table('follows')
            ->where('follower',Auth::id())
            ->where('follow',$request->input('unfollow'))
            ->delete();
    return back ();
}




    public function followerList(){
        $followers = DB::table('follows')
            ->join('users', 'follows.follower','users.id')
            ->where('follow',Auth::id())
            ->select('follows.follow', 'users.username', 'users.images','users.id')
            ->get();
            $followCount = DB::table('follows')
            ->where('follower',Auth::id())
            ->count();
            $followerCount = DB::table('follows')
            ->where('follow',Auth::id())
            ->count();
        return view('follows.followerList',compact('followers','followCount','followerCount'));
    }

    public function followList(){
        $follows = DB::table('follows')
            ->join('users', 'follows.follow','users.id')
            ->where('follower',Auth::id())
            ->select('follows.follower', 'users.username', 'users.images','users.id')
            ->get();
            $followCount = DB::table('follows')
            ->where('follower',Auth::id())
            ->count();
            $followerCount = DB::table('follows')
            ->where('follow',Auth::id())
            ->count();
        return view('follows.followList',compact('follows', 'followCount','followerCount'));
    }

}
