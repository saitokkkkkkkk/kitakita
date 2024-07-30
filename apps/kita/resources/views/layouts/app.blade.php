@include('partials.head')
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
