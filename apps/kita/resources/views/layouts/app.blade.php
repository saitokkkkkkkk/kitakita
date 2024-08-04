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
                        {!! Form::button('検索', ['type' => 'submit', 'class' => 'btn btn-sm btn-success text-nowrap rounded-start-0 px-4 me-2 fs-6']) !!}
                    {!! Form::close() !!}
                    @auth
                    <!-- 記事作成 -->
                    <!-- 人マーク -->
                    <div class="dropdown">
                        <a class="btn btn-outline-secondary dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="far fa-user-circle"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <!-- ここに「プロフィール編集」 -->
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item">ログアウト</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
</div>
</body>
