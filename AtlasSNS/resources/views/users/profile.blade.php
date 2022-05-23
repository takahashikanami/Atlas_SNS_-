@extends('layouts.login')

@section('content')

<div class="myProfile">
   <div class="profileImage">
      <img src="{{ asset('storage/images/' . $user->images) }}">
   </div>

   {!! Form::open(['url' => '/profile', 'files' => true]) !!}
    {{ Form::hidden('id',Auth::id()) }}
   @if ($errors->has('username'))
    <div class="alert-danger">
            <p>{{ $errors->first('username') }}</p>
    </div>
  @endif
   <div class="form-group main">
      {{ Form::label('UserName') }}
      {{ Form::text('username',$user->username,['class' => 'update']) }}
   </div>
   @if ($errors->has('mail'))
    <div class="alert-danger">
            <p>{{ $errors->first('mail') }}</p>
    </div>
  @endif
   <div class="form-group main">
      {{ Form::label('MailAddress') }}
      {{ Form::text('mail',$user->mail,['class' => 'update']) }}
   </div>
   @if ($errors->has('password'))
    <div class="alert-danger">
            <p>{{ $errors->first('password') }}</p>
    </div>
  @endif
   <div class="form-group password main">
      {{ Form::label('Password') }}
      {{ Form::password('password',null,['class' => 'update']) }}
   </div>
   <div class="form-group password main">
      {{ Form::label('Password Confirm') }}
      {{ Form::password('password_confirmation',null,['class' => 'update']) }}
   </div>
   <div class="form-group main">
      {{ Form::label('Bio') }}
      {{ Form::text('bio',$user->bio,['class' => 'update']) }}
   </div>
   <div class="form-group">
      {{ Form::label('Icon Image') }}
      {{ Form::file('image',['class' => 'update update-image']) }}
   </div>
   <div class="updateBtn">
      {{ Form::submit('更新', ['class' => 'update-profile']) }}
   </div>

   {!! Form::close() !!}
</div>


@endsection
