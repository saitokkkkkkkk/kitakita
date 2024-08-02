@include('partials.head')
<body>
<div id="app">
    <nav class="fixed-top navbar navbar-light bg-white navbar-border">
        <div class="container">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 d-flex justify-content-between align-items-center">
                    <!-- アプリ名 -->
                    <a class="navbar-brand bg-success fs-2 px-3 py-1 text-white text-decoration-none d-inline-flex justify-content-center align-items-center custom-ellipse" href="{{ route('articles.index') }}">
                        {{ config('app.name', 'Kita') }}
                    </a>
                    <!-- 検索窓 -->
                    {!! Form::open(['route' => 'articles.index', 'method' => 'GET', 'class' => 'd-flex align-items-center py-3']) !!}
                        {!! Form::search('search', request('search'), ['class' => 'form-control form-control-sm border-success rounded-end-0', 'placeholder' => 'Search for something', 'aria-label' => '検索']) !!}
                        {!! Form::button('検索', ['type' => 'submit', 'class' => 'btn btn-sm btn-success text-nowrap rounded-start-0 px-4 fs-6']) !!}
                    {!! Form::close() !!}
                    <!-- 記事作成 -->
                    <!-- 人マーク -->
                </div>
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
</div>
</body>

