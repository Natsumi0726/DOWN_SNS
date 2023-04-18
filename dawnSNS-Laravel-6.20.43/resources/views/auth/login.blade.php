@extends('layouts.logout')

@section('content')

<div class="container">
  <p class="welcome">DAWNSNSへようこそ</p>
  <div class="form">
{!! Form::open() !!}
<div class="adress">
{{ Form::label('MailAdress') }}
<br>
{{ Form::text('mail',null,['class' => 'input']) }}
</div>
<br>
<div class="password">
{{ Form::label('Password') }}
<br>
{{ Form::password('password',['class' => 'input']) }}
</div>
<br>
{{ Form::submit('LOGIN',['class' => 'button']) }}
{!! Form::close() !!}

<p class="new"><a href="/register">新規ユーザーの方はこちら</a></p>

    </div>
</div>

@endsection
