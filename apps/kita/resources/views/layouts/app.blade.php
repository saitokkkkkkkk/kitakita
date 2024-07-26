<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito:wght@100;200;300;400;600&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}"></script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <!-- アプリ名 -->
            <a class="navbar-brand text-white rounded-circle"
               href="{{ route('articles.index') }}"
               style="background-color: #8cbf6d; /* 黄緑色 */
                      font-size: 1.9rem; /* フォントサイズを調整 */
                      font-weight: 100; /* フォントをさらに細くする */
                      padding-left: 1.7rem; /* 左側のパディングを設定 */
                      padding-right: 1.7rem; /* 右側のパディングを設定 */
                      padding-top: 0.1rem; /* 上側のパディングを設定 */
                      padding-bottom: 0.1rem; /* 下側のパディングを設定 */
                      text-decoration: none; /* テキストの下線を消す */
                      font-family: 'Nunito Sans', sans-serif; /* Nunito フォント */">
                {{ config('app.name', 'Kita') }}
            </a>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
