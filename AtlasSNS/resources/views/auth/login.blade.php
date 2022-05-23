@extends('layouts.logout')

@section('content')

<div class="login-wrap">
  {!! Form::open(['url' => '/login']) !!}

<p class="login-title">AtlasSNSへようこそ</p>

{{ Form::label('e-mail') }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::submit('LOGIN',['class' => 'submit']) }}

<p class="register-btn"><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}
</div>

@endsection
