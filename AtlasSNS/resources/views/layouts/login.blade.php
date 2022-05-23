<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header class="header">
        <div id ="head">
        <h1 class="logo">
            <a href="/top"><img src="{{ asset('images/atlas.png')}}"></a>
        </h1>
            <div id="accordionMenu">
                <div class="userMenu">
                    <p >{{ Auth::user()->username }} さん</p>
                    <div class="profileImage">
                        <img src="{{ asset('storage/images/' . Auth::user()->images) }}">
                    </div>
                <div>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
                <ul class="userContent">
                    <li ><a href="/top">HOME</a></li>
                    <li><a href="/profile">プロフィール編集</a></li>
                    <li><a href="/logout">ログアウト</a></li>
                </ul>
            <div id="confirm">
                <p>{{ \Auth::user()->username }}さんの</p>
                <div class="user-info">
                <p>フォロー数</p>
                <p class="follow-person">{{Auth()->user()->follows->count()}}人</p>
                </div>
                <p class="button about-follow"><a href="/follow-list">フォローリスト</a></p>
                <div class="user-info">
                <p>フォロワー数</p>
                <p class="followed-person">{{Auth()->user()->followers->count()}}人</p>
                </div>
                <p class="button about-follow"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
            <p class="button search-button"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
