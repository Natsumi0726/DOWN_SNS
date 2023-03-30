@extends('layouts.login')
@section('content')

<p>フォロワー!!!!!!</p>
@foreach ($followers as $followers)
<img src="/images/{{$followers->images}}">
{{ $followers->username }}
@endforeach

@endsection