@extends('layouts.logout')

@section('content')

<div class="login-wrap">
  <div id="clear">
  <p class="userName">{{ session('registered') }}さん</p>
  <p class="br">ようこそ！AtlasSNSへ！</p>
  <p class="complete">ユーザー登録が完了しました。</p>
  <p class="br complete">早速ログインをしてみましょう。</p>

  <p class="btn"><a href="/login">ログイン画面へ</a></p>
</div>
</div>

@endsection
