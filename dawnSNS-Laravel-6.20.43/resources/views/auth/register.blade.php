@extends('layouts.logout')

@section('content')

@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach

<div class="container">
<h2>新規ユーザー登録</h2>

<div class="form">
{!! Form::open() !!}
<div class="UserName">
{{ Form::label('UserName') }}
<br>
{{ Form::text('username',null,['class' => 'input']) }}
<br>
</div>
<div class="MailAdress">
{{ Form::label('MailAdress') }}
<br>
{{ Form::text('mail',null,['class' => 'input']) }}
<br>
</div>
<div class="password">
{{ Form::label('Password') }}
<br>
{{ Form::text('password',null,['class' => 'input']) }}
<br>
</div>
<div class="Password-confirm">
{{ Form::label('Password confirm') }}
<br>
{{ Form::text('password-confirm',null,['class' => 'input']) }}
<br>
</div>
{{ Form::submit('REGISTER',['class' => 'button']) }}
</div>
<p class="back"><a href="/login">ログイン画面へ戻る</a></p>
</div>

{!! Form::close() !!}


@endsection
