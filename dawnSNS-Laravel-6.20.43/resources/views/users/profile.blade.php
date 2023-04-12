@extends('layouts.login')

@section('content')

<img src="/images/{{$user->images}}">
<form action="profile-update" method="post">
@csrf
        <div>
            <label for="name">UserName</label>
            <input type="text" id="userName" name="userName" value="{{$user->username}}">
        </div>
        <div>
            <label for="email">MailAdress</label>
            <input type="mail" id="mailAdress" name="mailAdress" value="{{$user->mail}}">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="mail" id="password" name="password" value="{{$user->password}}">
        </div>
        <div>
            <label for="New-Password">New Password</label>
            <input type="text" id="newPassword" name="newPassword" placeholder="新しいパスワード">
        </div>
        <div>
            <label for="Bio">Bio</label>
            <input type="textarea" id="bio" name="bio" value="{{$user->bio}}">
        </div>
        <div>
            <label for="Icon-Image">Icon Image</label>
            <input type="file" id="iconImage" name="iconImage" accept=".png,.jpg,.jpeg,image/png,image/jpg" value="ファイルを選択">
        </div>
        <input type="submit" value="更新">
    </form>



@endsection