@extends('layouts.login')
@section('content')

<div class='container'>
    <div class="profile-contents">
        <table>
            <tr class="pofile-index">
                <td><img class="post-image" src="/storage/images/{{ $users->images }}"></td>
                <td class="plofile-name">Name<p>{{$users->username}}</p></td>
                <td class="plofile-bio">Bio<p>{{$users->bio}}</p></td>
            </tr>
        </table>
        @if(!$followers->contains($users->id))
        {!! Form::open(['url' => '/Follows/follow']) !!}
        <div class="form-group">
            {!! Form::hidden('follow', $users->id) !!}
        </div>
        <button type="submit" class="btn-follow btn-success pull-right">フォローする</button>
        {!! Form::close() !!}
        @else
        {!! Form::open(['url' => '/unfollow']) !!}
        <div class="form-group">
                    {!! Form::hidden('unfollow', $users->id) !!}
        </div>
        <button type="submit" class="btn-follower" >フォローを外す</button>
        {!! Form::close() !!}
        @endif
    </div>
    <div class="post-contents">
        <table class='table table-hover'>
            @foreach ($posts as $post)
            <tr>
                <td><img class="post-image" src="/storage/images/{{ $post->images }}"></td>
                <td class="user-name"><p>{{ $post->username }}</p></td>
                <td class="user-post">{{ $post->posts }}</td>
                <td class="post-time">{{ $post->created_at }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection