@extends('layouts.login')

@section('content')

<img  class="my-image" src="/storage/images/{{$user->images}}">
<form action="profile-update" method="post" enctype="multipart/form-data">
@csrf
        <div class="profile">
            <label class="profile-label" for="name">UserName</label>
            <input type="text" id="userName" name="userName" value="{{$user->username}}">
        </div>
        <div class="profile">
            <label class="profile-label" for="email">MailAdress</label>
            <input type="mail" id="mailAdress" name="mailAdress" value="{{$user->mail}}">
        </div>
        <div class="profile">
            <label class="profile-label" for="password">Password</label>
            <input type="password" id="password" name="password" value="{{$user->password}}">
        </div>
        <div class="profile">
            <label class="profile-label" for="New-Password">New Password</label>
            <input type="password" id="newPassword" name="newPassword" placeholder="新しいパスワード">
        </div>
        <div class="profile">
            <label class="profile-label" for="Bio">Bio</label>
            <input type="textarea" id="bio" name="bio" value="{{$user->bio}}">
        </div>
        <div class="profile">
            <label class="profile-label" for="Icon-Image">Icon Image</label>
            <input type="file" id="iconImage" name="iconImage">
        </div>
        <input class="update-btn" type="submit" value="更新">
    </form>



@endsection