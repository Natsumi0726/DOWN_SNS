@extends('layouts.login')

@section('content')


<div class="container">
    <div class="search-box">
        <form action="/search" id="search-form">
            <input type="text" id="search-input" placeholder="ユーザー名を入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
                <button type="submit" ><img src="/images/seach.png"></button>
        </form>
        @if($search)
        <p>検索ワード：{{ $search }}</p>
        @endif
    </div>
    <div class="search-list">
        @foreach($users as $user)
        <div class="user-inform">
            <a href="/users/{{ $user->id }}/otherUsers">
            <img  class="main-image" src="/images/{{$user->images}}">
            </a>
            <p class="username"> {{ $user->username }}</p>
            <div class="botton">
                @if(!$followers->contains($user->id))
                {!! Form::open(['url' => 'Follows/follow']) !!}
                {!! Form::hidden('follow', $user->id) !!}
                <button type="submit" class="btn-follow btn-success pull-right">フォローする</button>
                {!! Form::close() !!}
                @else
                {!! Form::open(['url' => '/unfollow']) !!}
                {!! Form::hidden('unfollow', $user->id) !!}
                <button type="submit" class="btn-follower" >フォローを外す</button>
                {!! Form::close() !!}
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection