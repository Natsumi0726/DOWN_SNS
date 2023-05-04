@extends('layouts.login')
@section('content')

<div class='container'>
    <div class="profile-contents">
            <img class="userProfile-image" src="/storage/images/{{ $users->images }}">
            <div class="pro-name-bio">
                <div class="plofile-name">
                    <p class="Name">Name</p>
                    <p class="name">{{$users->username}}</p>
                </div>
                <div class="plofile-bio">
                    <p class="Bio">Bio</p>
                    <p class="bio">{{$users->bio}}</p>
                </div>
            </div>
        @if(!$followers->contains($users->id))
        {!! Form::open(['url' => '/Follows/follow']) !!}
        <div class="form-group">
            {!! Form::hidden('follow', $users->id) !!}
        </div>
        <button type="submit" class="btn-follow" id="profile-btn">フォローする</button>
        {!! Form::close() !!}
        @else
        {!! Form::open(['url' => '/unfollow']) !!}
        <div class="form-group">
                    {!! Form::hidden('unfollow', $users->id) !!}
        </div>
        <button type="submit" class="btn-follower" id="profile-btn">フォローを外す</button>
        {!! Form::close() !!}
        @endif
    </div>
    <div class="post-contents">
        @foreach ($posts as $post)
        <table class='table table-hover'>
            <tr class="image-name-time">
                <td><img class="post-image" src="/storage/images/{{ $post->images }}"></td>
                <td class="user-name"><p>{{ $post->username }}</p></td>
                <td class="post-time">{{ $post->created_at }}</td>
            </tr>
            <tr class="post-icon">
                <td class="user-post">{{ $post->posts }}</td>
            </tr>
            </table>
        @endforeach
        </table>
    </div>
</div>

@endsection