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
        <table class='table table-hover'>
            @foreach ($posts as $post)
                <tr>
                    <td><a href="/users/{{ $post->user_id }}/otherUsers"><img class="post-image" src="/storage/images/{{ $post->images }}"></a></td>
                    <td class="user-name"><p>{{ $post->username }}さん</p></td>
                    <td class="user-post">{{ $post->posts }}</td>
                    <td class="post-time">{{ $post->created_at }}</td>
            @endforeach
        </table>
    </div>
    <div class="follower-post">
    </div>
</div>



@endsection