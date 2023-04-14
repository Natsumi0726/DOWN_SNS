<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8"'>
    <link rel='stylesheet' href="{{ asset('/css/app.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    @extends('layouts.login')

@section('content')

<div class='container'>
{!! Form::open(['url' => 'posts/create']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容']) !!}
        </div>
        <button type="submit" class="btn btn-success pull-right">追加</button>
        {!! Form::close() !!}
        <table class='table table-hover'>
            @foreach ($posts as $post)
            <tr>
                <td><img src="/storage/images/{{ $post->images }}"></td>
                <td><p>{{ $post->username }}さん</p></td>
                <td>{{ $post->posts }}</td>
                <td>{{ $post->created_at }}</td>

                {!! Form::open(['url' => 'posts/update']) !!}
        <div class="form-group">
        {!! Form::hidden('id', $post->id) !!}
            {!! Form::input('text', 'upPosts', $post->posts, ['required', 'class' => 'form-control',]) !!}
        </div>
        <button type="submit" class="btn btn-success pull-right">更新</button>
        {!! Form::close() !!}
                <td><a class="btn btn-danger" href="/posts/{{ $post->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td>
            </tr>
            @endforeach
        </table>
    </div>

@endsection

</body>

</html>