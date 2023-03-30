@extends('layouts.login')
@section('content')

<p>フォロー数</p>
@foreach ($follows as $follows)
<img src="/images/{{$follows->images}}">
{{ $follows->username }}
@endforeach


@endsection
