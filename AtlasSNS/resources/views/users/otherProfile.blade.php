@extends('layouts.login')
@section('content')

<div class="otherProfile">
  <div class="profileImage">
    <img src="{{ asset('storage/images/' . $user->images) }}">
  </div>
  <div class="profileContents">
    <div class="profileInfo">
      <p>
        <span class="info">Name</span>
        {{$user->username}}
      </p>
      <p>
        <span class="info">Bio</span>
        {{$user->bio}}
      </p>
    </div>
    <div class="followingBtn following-button">
      @if (auth()->user()->isFollowing($user->id))
      <div>
        <a href="/search/{{$user->id}}/unfollow" class="unfollow">フォロー解除</a>
      </div>
      @else
      <div>
        <a href="/search/{{$user->id}}/follow" class="follow">フォローする</a>
      </div>
      @endif
    </div>
  </div>
</div>
<div class="posts-index">
  @foreach ($post as $list)
  <div class="posts">
    <div class="image-posts">
      <div class="icon-group">
        <div class="profileImage">
          <img src="{{ asset('storage/images/' . $list->user->images) }}">
        </div>
      </div>
      <div class="post-group">
        <div class="username">
          <p>{{ $list->user->username }}</p>
        </div>
        <div class="post">{{ $list->post }}</div>
      </div>
    </div>
    <div class="button-group">
      <div class="timestamp">{{ $list->created_at }}</div>
    </div>
  </div>
  @endforeach
</div>

@endsection
