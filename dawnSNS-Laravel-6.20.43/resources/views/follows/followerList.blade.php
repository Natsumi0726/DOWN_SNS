@extends('layouts.login')
@section('content')
<div class='container'>
    <div class="follows">
        <h3 class="follow">Follower list</h3>
        @foreach ($followers as $followers)
        <a href="/users/{{ $followers->id }}/otherUsers">
        <img src="/images/{{$followers->images}}">
        </a>
        @endforeach
    </div>
</div>



@endsection