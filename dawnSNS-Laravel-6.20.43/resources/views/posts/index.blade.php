@extends('layouts.login')
@section('content')

<div class='container'>
    {!! Form::open(['url' => 'posts/create']) !!}
    <div class="post-group">
        <img class="post-image" src="/storage/images/{{ Auth::user()->images }}">
            {!! Form::input('textarea', 'newPost', null, ['required', 'class' => 'post-control', 'placeholder' => '何をつぶやこうか…？']) !!}
        <button type="submit" class="post-btn btn-success pull-right"><img src="/images/post.png"></button>
        {!! Form::close() !!}
    </div>
    <table class='table table-hover'>
            @foreach ($posts->unique('id') as $post)
            <tr>
                <td><a href="/users/{{ $post->user_id }}/otherUsers"><img class="post-image" src="/storage/images/{{ $post->images }}"></a></td>
                <td class="user-name"><p>{{ $post->username }}さん</p></td>
                <td class="user-post">{{ $post->posts }}</td>
                <td class="post-time">{{ $post->created_at }}</td>
                @if($post->user_id === Auth::id())

                <td class="update"><a href="posts/update" class="modalopen"  data-target="modal{{ $post->id }}">
                    <img class="life-img" src="/images/edit.png"></a></td>
                <td class="trush"><a class="btn btn-danger" href="/posts/{{ $post->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="/images/trash.png" onmouseover="this.src='/images/trash_h.png'" onmouseout="this.src='/images/trash.png'"></a></td>
                @endif


                <div class="modal-main js-modal" id="modal{{ $post->id }}">
                    <div class="modal-inner">
                        <div class="inner-content">
                            {!! Form::open(['url' => 'posts/update']) !!}
                            {!! Form::hidden('id', $post->id) !!}
                            {!! Form::input('textarea', 'upPosts', $post->posts, ['required', 'class' => 'edit-control',]) !!}
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