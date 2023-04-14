@extends('layouts.login')
@section('content')

<p>フォロー数</p>
@foreach ($follows as $follows)
<a href="/users/{{ $follows->id }}/otherUsers">
<img src="/images/{{$follows->images}}">
</a>
{{ $follows->username }}
@endforeach


@endsection
