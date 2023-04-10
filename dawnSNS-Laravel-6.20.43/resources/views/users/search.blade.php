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

{!! Form::open(['url' => 'Follows/follow']) !!}
<div class="form-group">
            {!! Form::input('hidden', 'follow', null, []) !!}
        </div>
        <button type="submit" class="btn btn-success pull-right">フォローする</button>
        {!! Form::close() !!}

<form action="/unfollow">
<button type="submit" class="btn" >フォロー外す</button>
</form>
@endforeach


@endsection