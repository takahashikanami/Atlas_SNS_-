@extends('layouts.login')

@section('content')

<h2 class="list-title">Follow List</h2>
<div class="icons">
  <div class="icon-list">
    @foreach ($user as $list)
    @if ($list->id != Auth::user()->id)
    @if (auth()->user()->isFollowing($list->id))
    <div class="profileImage">
      <a href="otherUser/{{$list->id}}">
        <img src="{{ asset('storage/images/' . $list->images) }}">
      </a>
    </div>
    @endif
    @endif
    @endforeach
  </div>
</div>
<div class="posts-index">
  @foreach ($post as $list)
  @if (Auth::user()->isFollowing($list->user->id) )
  @if ($list->user->id != Auth::user()->id)
  <div class="posts">
    <div class="image-posts">
      <div class="icon-group">
        <div class="profileImage">
          <a href="otherUser/{{$list->user->id}}">
            <img src="{{ asset('storage/images/' . $list->user->images) }}">
          </a>
        </div>
      </div>
      <div class="post-group">
        <div class="username">
          <p>{{ $list->user->username }}</p>
        </div>
        <div class="post">
          {{ $list->post }}
        </div>
      </div>
    </div>
    <div class="button-group">
      <div class="timestamp">
        {{ $list->created_at }}
      </div>
    </div>
  </div>
  @endif
  @endif
  @endforeach
</div>
@endsection
