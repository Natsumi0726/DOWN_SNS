@extends('layouts.login')
@section('content')
<div class='container'>
    <div class="follows">
        <h3 class="follow">Follow list</h3>
        @foreach ($follows as $follows)
        <a href="/users/{{ $follows->id }}/otherUsers">
        <img src="/images/{{$follows->images}}">
        </a>
        @endforeach
    </div>

</div>


@endsection
