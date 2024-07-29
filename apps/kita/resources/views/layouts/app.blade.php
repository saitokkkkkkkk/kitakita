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
    <nav class="fixed-top navbar navbar-expand-md navbar-light bg-white navbar-border">
        <div class="container">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 d-flex justify-content-between align-items-center">
                    <!-- アプリ名 -->
                    <a class="navbar-brand text-white rounded-circle" href="{{ route('articles.index') }}">
                        {{ config('app.name', 'Kita') }}
                    </a>
                    <!-- 検索窓 -->
                    <form class="d-flex" action="{{ route('articles.search') }}" method="GET">
                        <input class="form-control me-2" type="search" name="search" placeholder="検索" aria-label="検索" value="{{ request('search') }}">
                        <button class="btn btn-outline-success" type="submit">検索</button>
                    </form>
                    <!-- 記事作成 -->
                    <!-- 人マーク -->
                </div>
            </div>
        </div>
    </nav>
    <main class="mt-10">
        @yield('content')
    </main>
</div>
</body>
</html>
