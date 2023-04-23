<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style.css">
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
    <header>
        <div id = "head">
            <div class="title"><h1><a href="/top"><img class="dawn-image" src="/images/main_logo.png"></a></h1></div>
            <div class="header-menu">
                <div class="menu-wrap">
                    <div class="menu-trigger">
                        <p>{{ Auth::user()->username }} さん</p>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div class="g-navi">
                    <div class="container nav-wrapper">
                        <ul>
                            <li class="nav-item"><a href="/top">HOME</a></li>
                            <li class="nav-item"><a href="/profile">プロフィール編集</a></li>
                            <li class="nav-item"><a href="/logout">ログアウト</a></li>
                        </ul>
                    </div>
                </div>
                <img class="my-image" src="/storage/images/{{ Auth::user()->images }}">
            </div>
        </div>
    </header>


    <div id="row">
            @yield('content')
            <div id="side-bar">
                <div id="confirm">
                    <p id="name">{{ Auth::user()->username }}さんの</p>
                    <div id="follow">
                        <p>フォロー数</p>
                        <p id="count">{{ $followCount }}名</p>
                    </div>
                        <p class="follow-btn"><a href="/followList">フォローリスト</a></p>
                    <div id="follow">
                        <p>フォロワー数</p>
                        <p id="count">{{ $followerCount }}名</p>
                    </div>
                    <p class="follow-btn"><a href="followerList">フォロワーリスト</a></p>
                </div>
                <p class="user-btn"><a href="/search">ユーザー検索</a></p>
            </div>
    </div>
    <footer>
    </footer>
    <script src="/webpack.mix.js"></script>
    <script src="/webpack.mix.js"></script>
  <script src="/js/app.js"></script>
</body>
</html>