@extends('layouts.login')

@section('content')



<form action="/search">
    <input type="text" placeholder="ユーザー名を入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
    <div>
        <button type="submit">検索</button>
    </div>
</form>

@foreach($users as $user)
<img src="/images/{{$user->images}}">
{{ $user->username }}




@if(!$followers->contains($user->id))
    {!! Form::open(['url' => 'Follows/follow']) !!}
<div class="form-group">
            {!! Form::hidden('follow', $user->id) !!}
        </div>
        <button type="submit" class="btn btn-success pull-right">フォローする</button>
        {!! Form::close() !!}
@else
    {!! Form::open(['url' => '/unfollow']) !!}
<div class="form-group">
            {!! Form::hidden('unfollow', $user->id) !!}
        </div>
<button type="submit" class="btn" >フォロー外す</button>
{!! Form::close() !!}
@endif





@endforeach


@endsection