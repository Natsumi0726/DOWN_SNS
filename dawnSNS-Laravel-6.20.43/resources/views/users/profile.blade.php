@extends('layouts.login')

@section('content')
<div id='container-profile'>
@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach
    <div><img  class="my-image" src="/storage/images/{{$user->images}}"></div>
    <form class="profile-update" action="profile-update" method="post" enctype="multipart/form-data">
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
                <input type="password" disabled id="password" name="password" value="{{$user->password}}">
            </div>
            <div class="profile">
                <label class="profile-label" for="New-Password">New Password</label>
                <input type="password" id="newPassword" name="newPassword" placeholder="新しいパスワード">
            </div>
            <div class="profile">
                <label class="profile-label" for="Bio">Bio</label>
                <textarea cols="20" rows="4" wrap="hard" id="bio" name="bio">{{$user->bio}}</textarea>
            </div>
            <div class="profile">
                <label class="profile-label" for="Icon-Image">Icon Image</label>
                <input type="file" id="iconImage" name="iconImage">
            </div>
            <input class="update-btn" type="submit" value="更新">
        </form>
</div>


@endsection