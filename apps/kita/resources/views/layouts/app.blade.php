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
                    {!! Form::open(['route' => 'articles.index', 'method' => 'GET', 'class' => 'd-flex align-items-center']) !!}
                        {!! Form::search('search', request('search'), ['class' => 'form-control me-0', 'placeholder' => 'Search for something', 'aria-label' => '検索']) !!}
                        {!! Form::button('検索', ['type' => 'submit', 'class' => 'btn btn-outline-success']) !!}
                    {!! Form::close() !!}
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
