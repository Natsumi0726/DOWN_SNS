@extends('layouts.login')

@section('content')



<div class="search-box">
        <form action="/search">
            <input type="text" placeholder="ユーザー名を入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
                <button type="submit"><img src="/images/seach.png"></button>
        </form>
    <div class="search-list">
        @foreach($users as $user)
        <div class="user-inform">
        <a href="/users/{{ $users->id }}/otherUsers">
            <img  class="main-image" src="/images/{{$user->images}}">
            </a>
           <p class="username"> {{ $users->username }}</p>
           <p class="bio"> {{ $users->bio }}</p>
            <div class="botton">
                @if(!$followers->contains($user->id))
                {!! Form::open(['url' => 'Follows/follow']) !!}
                {!! Form::hidden('follow', $user->id) !!}
                <button type="submit" class="btn-follow btn-success pull-right">フォローする</button>
                {!! Form::close() !!}
                @else
                {!! Form::open(['url' => '/unfollow']) !!}
                {!! Form::hidden('unfollow', $user->id) !!}
                <button type="submit" class="btn-follower" >フォロー外す</button>
                {!! Form::close() !!}
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection