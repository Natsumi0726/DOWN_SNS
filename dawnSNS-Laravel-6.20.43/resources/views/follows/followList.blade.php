@extends('layouts.login')
@section('content')

<h3 class="follow">Follow　list</h3>
@foreach ($follows as $follows)
<div class="follows">
<a href="/users/{{ $follows->id }}/otherUsers">
<img src="/images/{{$follows->images}}">
</a></div>
@endforeach


@endsection
