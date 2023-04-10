@extends('layouts.login')
@section('content')

<p>フォロワー</p>
@foreach ($followers as $followers)
<a href="/profile">
<img src="/images/{{$followers->images}}">
</a>
{{ $followers->username }}
@endforeach

@endsection