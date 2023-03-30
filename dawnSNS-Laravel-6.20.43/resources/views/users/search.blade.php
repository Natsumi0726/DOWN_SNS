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
<form action="/follow">
<button type="submit" class="btn" >フォローする</button>
</form>
<form action="/unfollow">
<button type="submit" class="btn" >フォロー外す</button>
</form>
@endforeach


@endsection