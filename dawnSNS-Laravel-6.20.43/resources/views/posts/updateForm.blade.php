@extends('layouts.app')

@section('content')
    <div class='container'>
        <h2 class='page-header'>投稿内容を変更する</h2>
        {!! Form::open(['url' => '/posts/update']) !!}
        <div class="form-group">
            {!! Form::hidden('id', $posts->id) !!}
            {!! Form::input('text', 'upPosts', $posts->posts, ['required', 'class' => 'posts-control']) !!}
        </div>
        <button type="submit" class="btn btn-primary pull-right">更新</button>
        {!! Form::close() !!}
    </div>

@endsection
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>

</html>