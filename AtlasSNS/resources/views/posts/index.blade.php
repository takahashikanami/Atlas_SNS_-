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
    <tr>
      <td>{{ $list->user->username }}</td>
      <td>{{ $list->post }}</td>
      <td>{{ $list->created_at }}</td>
      <div class="buttons">
        <div class="editBtn">
          <td><a href="/post/{{$list->id}}/update-form"><img src="images/edit.png"></a>
          </td>
        </div>
        <div class="trashBtn">
          <td><a class="delete" href="/post/{{$list->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか?')"><img src="images/trash.png"></a></td>
        </div>
      </div>
    </tr>
  @endif
  @endforeach
</div>


@endsection
