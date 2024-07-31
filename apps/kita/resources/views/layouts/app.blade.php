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

