<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class UsersController extends Controller
{

    /**
     * ユーザー一覧
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function search(Request $request)
    {

        $search = $request->search;
       // もし検索フォームにキーワードが入力されたら
        if (isset($search)){
            $users = DB::table('users')
            ->where('username','like',"%".$search."%")
            ->select('images','username')
            ->get();
        }else{
            $users = DB::table('users')
            ->select('images','username')
            ->get();
        }

        // ビューにusersとsearchを変数として渡す
        return view('users.search', [
            'users' => $users,
            'search' => $search,
        ]);
    }
}