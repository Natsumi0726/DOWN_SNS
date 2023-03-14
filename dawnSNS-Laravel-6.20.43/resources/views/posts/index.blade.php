<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8"'>
    <link rel='stylesheet' href="{{ asset('/css/app.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    <header>
        <h1>Laravelを使った投稿機能の実装</h1>
    </header>
    
    @extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>

<div class='container'>
<p class="pull-right"><a class="btn btn-success" href="post/create-form">投稿する</a></p>
        <h2 class='page-header'>投稿一覧</h2>
        <table class='table table-hover'>
            <tr>
                <th>投稿No</th>
                <th>投稿内容</th>
                <th>投稿日時</th>
            </tr>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->post }}</td>
                <td>{{ $post->created_at }}</td>
            </tr>
            @endforeach
        </table>
    </div>

@endsection

</body>

</html>