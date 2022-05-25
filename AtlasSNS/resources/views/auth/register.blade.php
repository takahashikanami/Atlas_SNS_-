@extends('layouts.logout')
@section('content')

<div class="login-wrap">
  {!! Form::open(['url' => '/register']) !!}

<h2>新規ユーザー登録</h2>
@if ($errors->has('username'))
    <div class="alert-danger">
            <p>{{ $errors->first('username') }}</p>
    </div>
  @endif
{{ Form::label('UserName') }}
{{ Form::text('username',null,['class' => 'input']) }}

@if ($errors->has('mail'))
    <div class="alert-danger">
            <p>{{ $errors->first('mail') }}</p>
    </div>
@endif
{{ Form::label('MailAddress') }}
{{ Form::text('mail',null,['class' => 'input']) }}

@if ($errors->has('password'))
    <div class="alert-danger">
            <p>{{ $errors->first('password') }}</p>
    </div>
  @endif
{{ Form::label('Password') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::label('Password Confirm') }}
{{ Form::password('password_confirmation',['class' => 'input']) }}

{{ Form::submit('register',['class'=>'register']) }}

<p class="return"><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}
</div>


@endsection
