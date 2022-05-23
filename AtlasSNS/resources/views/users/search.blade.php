@extends('layouts.login')

@section('content')
<div class="search-form">
{!! Form::open(['url' =>'/search']) !!}
　{!! Form::input('text' , 'name' , null,['class' => 'form-control','placeholder' => 'username']) !!}
<button type="submit" class="btn-search">検索</button>
{!! Form::close() !!}
<div class="session">
    検索ワード：{{ session('search') }}
  </div>
</div>

<div class="users-index">
  @foreach ($users as $list)
  @if($list->id != Auth::id())
  <div class="users">
    <div class="icon-group">
      <div class="profileImage">
        <img src="{{ asset('storage/images/' . $list->images) }}">
      </div>
    </div>
    <div class="user-group">
      <div class="username">
        <p>{{$list->username}}</p>
      </div>
    </div>
    <div class="following-button">
        @if (auth()->user()->isFollowing($list->id))
        <div><a href="/search/{{$list->id}}/unfollow" class="unfollow">フォロー解除</a></div>
        @else
        <div><a href="/search/{{$list->id}}/follow" class="follow">フォローする</a></div>
        @endif
    </div>
  </div>
  @endif
  @endforeach
</div>


@endsection
