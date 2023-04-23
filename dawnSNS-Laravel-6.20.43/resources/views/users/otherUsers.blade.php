@extends('layouts.login')
@section('content')

<div class='container'>
    <div>
     <table>
        <tr>
            <td><img src="/storage/images/{{ $users->images }}"></td>
            <td>Name<p>{{$users->username}}</p></td>
            <td>Bio<p>{{$users->bio}}</p></td>
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
<button type="submit" class="btn-follower" >フォロー外す</button>
{!! Form::close() !!}
@endif

    </div>
    <table class='table table-hover'>
            @foreach ($posts as $post)
            <tr>
                <td><img src="/storage/images/{{ $post->images }}"></td>
                <td><p>{{ $post->username }}</p></td>
                <td>{{ $post->posts }}</td>
                <td>{{ $post->created_at }}</td>
            </tr>
            @endforeach
    </table>
</div>

@endsection