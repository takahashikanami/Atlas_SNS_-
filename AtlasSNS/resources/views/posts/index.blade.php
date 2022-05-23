@extends('layouts.login')
@section('content')

<div class="post-form">
  <div class="profileImage">
        <img src="{{ asset('storage/images/' . $user->images) }}">
  </div>
    <div class="form-content">
      {!! Form::open(['url' => '/post']) !!}
      {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください']) !!}
      <button type="submit" class="btn-post"><img src="images/post.png" alt=""></button>
      {!! Form::close() !!}
    </div>
</div>
<!--投稿内容の表示-->
<div class="posts-index">
  @foreach($post as $list)
  @if ($list->user->id == Auth::id() || Auth::user()->isFollowing($list->user->id))
  <div class="posts">
    <div class="image-posts">
      <div class="icon-group">
        <div class="profileImage">
          <img src="{{ asset('storage/images/' . $list->user->images) }}">
        </div>
      </div>
      <div class="post-group">
        <p class="username">
        {{ $list->user->username }}
        </p>
        <div class="post">
          {{ $list->post }}
        </div>
      </div>
    </div>
    <div class="btn-group">
      <div class="timestamp">
        {{ $list->created_at }}
      </div>
      <div class="buttons">
      @if($list->user->id == Auth::id())
        <div class="edit-button">
          <label onclick="editModal({{$list->id}})">
          <img src="images/edit.png">
          <label>
          </div>
          @endif
        <div class="delete-button">
          <a class="btn btn-danger" href="/post/{{$list->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
          @if($list->user->id == Auth::id())
            <img src="images/trash.png" onmouseover="this.src='images/trash-h.png'" onmouseout="this.src='images/trash.png'">
          @endif
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="edit-modal editModal-{{ $list->id }}">
    <div class="modal-content">
      <form method="POST" enctype="multipart/form-data" action="/post/update">
        @csrf
        <textarea name="text" rows="5">
          {{$list->post}}
        </textarea>
        <input type="hidden" value="{{$list->id}}" name="id">
        <div class="line-right">
          <!-- モーダルを閉じるボタン(関数名と一致させないとモーダルが閉じません) -->
          <button type="button" class="left-button btn-post" onclick="editModal({{ $list->id }})">cancel</button>
          <!-- 送信ボタン -->
          <button type="submit" class="right-button btn-post">
            <img src="images/edit.png">
          </button>
        </div>
      </form>
    </div>
  </div>
  @endif
  @endforeach
</div>

@endsection
