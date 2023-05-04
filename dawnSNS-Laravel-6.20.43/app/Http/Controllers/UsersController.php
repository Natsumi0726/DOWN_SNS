<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


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
            ->where('id','<>',Auth::id())
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

    public function profile(Request $request)
    {
        $user = DB::table('users')
            ->where('id',Auth::id())
            ->select('images','username','id','mail','password','bio',)
            ->first();
        $followCount = DB::table('follows')
            ->where('follower',Auth::id())
            ->count();
            $followerCount = DB::table('follows')
            ->where('follow',Auth::id())
            ->count();
        return view('users.profile',[
            'followCount'=>$followCount,
            'followerCount'=>$followerCount,
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        $validator = $request->validate([
        'userName' => ['required', 'string', 'min:4', 'max:12'
    ],[
            'userName.required' => 'ユーザ名は必須項目です',
            'userName.min' => 'ユーザ名は4文字以上で入力してください',
            'userName.max' => 'ユーザ名は12文字以内で入力してください',
        ],
        'mailAdress' => ['required', 'string', 'email', 'min:4', 'max:12', Rule::unique('users', 'mail')->ignore(Auth::id())
    ],[
        'mailAdress.required' => 'メールアドレスは必須項目です',
        'mailAdress.min' => 'メールアドレスは4文字以上で入力してください',
        'mailAdress.max' => 'メールアドレスは12文字以内で入力してください',
        'mailAdress.email' => 'メールアドレスではありません',
    ]]);

        if(!$request->newPassword && $request->iconImage){//パスワードなしアイコンあり
        $username = $request->input('userName');
        $mailAdress = $request->input('mailAdress');
        $newPassword = $request->input('newPassword');
        $bio = $request->input('bio');
        $iconImage = $request->file('iconImage')->getClientOriginalName();
        $request->file('iconImage')->storeAs('images', $iconImage, 'public');
        DB::table('users')
            ->where('id',Auth::id())
            ->update(
                ['username' => $username,
                'mail' => $mailAdress,
                'bio' => $bio,
                'images' => $iconImage,
                ]
            );
        }else if ($request->newPassword && $request->iconImage){//パスワードありアイコンあり
            $validator = $request->validate([
                'newPassword' => [ 'string',  'min:4', 'max:12', 'alpha_num'
    ],[
        'newPassword.min' => 'パスワードは4文字以上で入力してください',
        'newPassword.max' => 'パスワードは12文字以内で入力してください',
        'newPassword.alpha_num' => 'パスワードは英数字で入力してください',
        ]]);
            $username = $request->input('userName');
            $mailAdress = $request->input('mailAdress');
            $newPassword = $request->input('newPassword');
            $bio = $request->input('bio');
            $iconImage = $request->file('iconImage')->getClientOriginalName();
            $request->file('iconImage')->storeAs('images', $iconImage, 'public');
            DB::table('users')
                ->where('id',Auth::id())
                ->update(
                    ['username' => $username,
                    'mail' => $mailAdress,
                    'password' => Hash::make($newPassword),
                    'bio' => $bio,
                    'images' => $iconImage,
                    ]
                );
        }else if($request->newPassword && !$request->iconImage){//パスワードありアイコンなし
            $validator = $request->validate([
                'newPassword' => [ 'string',  'min:4', 'max:12', 'alpha_num'
    ],[
        'newPassword.min' => 'パスワードは4文字以上で入力してください',
        'newPassword.max' => 'パスワードは12文字以内で入力してください',
        'newPassword.alpha_num' => 'パスワードは英数字で入力してください',
        ]]);
            $username = $request->input('userName');
            $mailAdress = $request->input('mailAdress');
            $newPassword = $request->input('newPassword');
            $bio = $request->input('bio');
            DB::table('users')
                ->where('id',Auth::id())
                ->update(
                    ['username' => $username,
                    'mail' => $mailAdress,
                    'password' => Hash::make($newPassword),
                    'bio' => $bio,
                    ]
                );
            }else{//パスワードなしアイコンなし
                $username = $request->input('userName');
                $mailAdress = $request->input('mailAdress');
                $newPassword = $request->input('newPassword');
                $bio = $request->input('bio');
                DB::table('users')
                    ->where('id',Auth::id())
                    ->update(
                        ['username' => $username,
                        'mail' => $mailAdress,
                        'bio' => $bio,
                        ]
                    );
            }

        return redirect('/top');
    }

    public function otherUsers($otherUsers)
    {
        $posts = DB::table('posts')
        ->join('users', 'posts.user_id','=', 'users.id')
        ->select('posts.user_id','posts.posts','posts.id','posts.created_at','users.username','users.images')
        ->where('posts.user_id',$otherUsers)
        ->get();

        $users = DB::table('users')
        ->where('id',$otherUsers)
        ->select('username','images','bio','id')
        ->first();
        $followers = DB::table('follows')
        ->where('follower',Auth::id())
        ->pluck('follow');

        $followCount = DB::table('follows')
            ->where('follower',Auth::id())
            ->count();
        $followerCount = DB::table('follows')
            ->where('follow',Auth::id())
            ->count();
        return view('users.otherUsers',['posts'=>$posts, 'followCount'=>$followCount,'followerCount'=>$followerCount,'users'=>$users,'followers'=>$followers]);
}
    public function __construct()
    {
        $this->middleware('auth');
    }
}