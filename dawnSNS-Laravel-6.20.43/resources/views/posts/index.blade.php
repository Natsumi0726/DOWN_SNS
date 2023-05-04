@extends('layouts.login')
@section('content')

<div class='container'>
    {!! Form::open(['url' => 'posts/create']) !!}
    <div class="post-group">
        <img class="post-image" src="/storage/images/{{ Auth::user()->images }}">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
            {!! Form::textarea('newPost', null, ['required', 'class' => 'post-control', 'placeholder' => '何をつぶやこうか…？']) !!}
        <button type="submit" class="post-btn btn-success pull-right"><img src="/images/post.png"></button>
        {!! Form::close() !!}
    </div>
    @foreach ($posts->unique('id') as $post)
        <table class='table table-hover'>
            <tr class="image-name-time">
                <td><a href="/users/{{ $post->user_id }}/otherUsers"><img class="post-image" src="/storage/images/{{ $post->images }}"></a></td>
                <td class="user-name"><p>{{ $post->username }}さん</p></td>
                
                <td class="post-time">{{ $post->created_at }}</td>
            </tr>
            <tr class="post-icon">
                <td class="user-post">{{ $post->posts }}</td>
                @if($post->user_id === Auth::id())
                <td class="update"><a href="posts/update" class="modalopen"  data-target="modal{{ $post->id }}">
                    <img class="life-img" src="/images/edit.png"></a></td>
                <td class="trush"><a class="btn btn-danger" href="/posts/{{ $post->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="/images/trash.png" onmouseover="this.src='/images/trash_h.png'" onmouseout="this.src='/images/trash.png'"></a></td>
                @endif
            </tr>
                <div class="modal-main js-modal" id="modal{{ $post->id }}">
                    <div class="modal-inner">
                        <div class="inner-content">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                            {!! Form::open(['url' => 'posts/update']) !!}
                            {!! Form::hidden('id', $post->id) !!}
                            {!! Form::textarea( 'upPosts', $post->posts, ['required','cols=40','rows=4', 'class' => 'edit-control',]) !!}
                            <button type="submit" class="btn btn-success pull-right"><img src="/images/edit.png"></button>
                        </div>
                    </div>
                </div>
             {!! Form::close() !!}
         </table>
    @endforeach
 </div>
@endsection

</body>

</html>