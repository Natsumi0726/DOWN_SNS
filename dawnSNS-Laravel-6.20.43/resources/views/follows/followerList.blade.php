@extends('layouts.login')
@section('content')
<div class='container'>
    <div class="follows">
        <h3 class="follow">Follower list</h3>
        <div class="user-box">
            @foreach ($followers as $followers)
            <a href="/users/{{ $followers->id }}/otherUsers">
            <img class="user-image" src="/images/{{$followers->images}}">
            </a>
            @endforeach
        </div>
            @foreach ($posts as $post)
            <table class='table table-hover'>
            <tr class="image-name-time">
                <td><a href="/users/{{ $post->user_id }}/otherUsers"><img class="post-image" src="/storage/images/{{ $post->images }}"></a></td>
                <td class="user-name"><p>{{ $post->username }}さん</p></td>
                <td class="post-time">{{ $post->created_at }}</td>
            </tr>
            <tr class="post-icon">
                <td class="user-post">{{ $post->posts }}</td>
            </tr>
            </table>
            @endforeach

    </div>
    <div class="follower-post">
    </div>
</div>



@endsection