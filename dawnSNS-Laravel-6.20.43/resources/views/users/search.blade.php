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
<button type="submit" class="btn">フォローする</button>
@endforeach


@endsection