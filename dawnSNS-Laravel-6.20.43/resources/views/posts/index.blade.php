@extends('layouts.login')

@section('content')

<div class='container'>
{!! Form::open(['url' => 'posts/create']) !!}
        <div class="post-group">
        <img class="main-image" src="/storage/images/{{ Auth::user()->images }}">
            {!! Form::input('textarea', 'newPost', null, ['required', 'class' => 'post-control', 'placeholder' => '何をつぶやこうか…？']) !!}
        <button type="submit" class="post-btn btn-success pull-right"><img src="/images/post.png"></button>
        {!! Form::close() !!}
        </div>
        <table class='table table-hover'>
            @foreach ($posts as $post)
            <tr>
                <td><img class="post-image" src="/storage/images/{{ $post->images }}"></td>
                <td class="user-name"><p>{{ $post->username }}さん</p></td>
                <td class="user-post">{{ $post->posts }}</td>

                <td><a href="posts/update" class="modalopen"  data-target="modal01">
                    <img class="life-img" src="/images/edit.png"></a></td>
                <td class="trush"><a class="btn btn-danger" href="/posts/{{ $post->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="/images/trash.png" onmouseover="this.src='/images/trash_h.png'" onmouseout="this.src='/images/trash.png'"></a></td>
                <td class="post-time">{{ $post->created_at }}</td>


                <div class="modal-main js-modal" id="modal01">
                    <div class="modal-inner">
                        <div class="inner-content">
                            {!! Form::open(['url' => 'posts/update']) !!}
                            {!! Form::hidden('id', $post->id) !!}
                            {!! Form::input('text', 'upPosts', $post->posts, ['required', 'class' => 'edit-control',]) !!}
                            <button type="submit" class="btn btn-success pull-right"><img src="/images/edit.png"></button>
                        </div>
                    </div>
                </div>
            </tr>
             {!! Form::close() !!}
            @endforeach
        </table>
    </div>

@endsection

</body>

</html>