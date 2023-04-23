@extends('layouts.login')
@section('content')

<h3 class="follow">Follower list</h3>
@foreach ($followers as $followers)
<div class="follows">
<a href="/users/{{ $followers->id }}/otherUsers">
<img src="/images/{{$followers->images}}">
</a>
</div>
@endforeach


@endsection