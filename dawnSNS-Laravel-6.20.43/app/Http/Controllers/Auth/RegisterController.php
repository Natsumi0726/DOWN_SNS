<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/added';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|min:4|max:12',
            'mail' => 'required|string|email|min:4|max:12|unique:users',
            'password' => 'required|string|min:4|max:12|alpha_num|unique:users',
            'password-confirm' => 'required|string|min:4|max:12|alpha_num|same:password',
        ],[
        'username.required' => 'ユーザ名は必須項目です',
        'mail.required' => 'メールアドレスは必須項目です',
        'password.required' => 'パスワードは必須項目です',
        'password-confirm.required' => 'パスワードは必須項目です',
        'username.min' => 'ユーザ名は4文字以上で入力してください',
        'username.max' => 'ユーザ名は12文字以内で入力してください',
        'mail.min' => 'メールアドレスは4文字以上で入力してください',
        'mail.max' => 'メールアドレスは12文字以内で入力してください',
        'password.min' => 'パスワードは4文字以上で入力してください',
        'password.max' => 'パスワードは12文字以内で入力してください',
        'password.alpha_num' => 'パスワードは英数字で入力してください',
        'password-confirm.alpha_num' => 'パスワードは英数字で入力してください',
        'mail.email' => 'メールアドレスではありません',
		'password-confirm.same' => 'パスワードと確認用パスワードが一致していません',

        ])->validate();
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }


    // public function registerForm(){
    //     return view("auth.register");
    // }

    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            $this->validator($data);
            $this->create($data);
            return redirect('added');
        }
        return view('auth.register');
    }

    public function added(){
        $user = DB::table('users')
        ->latest()
        ->first();
        return view('auth.added',['user'=>$user]);
    }
    
}

?>