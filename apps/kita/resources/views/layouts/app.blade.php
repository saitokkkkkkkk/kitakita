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

                    <!-- 576px未満の時の検索窓アイコン -->
                    <div class="dropdown">
                        <button class="btn btn-outline-success  d-sm-none me-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-search"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end p-2">
                            {!! Form::open(['route' => 'articles.index', 'method' => 'GET', 'class' => 'd-flex align-items-center']) !!}
                                {!! Form::search('search', request('search'), ['class' => 'form-control form-control-sm border-success rounded-end-0', 'placeholder' => 'Search for something']) !!}
                                {!! Form::button('<i class="fas fa-search"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-success rounded-start-0 px-1 me-2 fs-6']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>

                    <!-- 576px以上の時の検索フォーム -->
                    <div id="search-form" class="d-none d-sm-flex align-items-center py-3">
                        {!! Form::open(['route' => 'articles.index', 'method' => 'GET', 'class' => 'd-flex align-items-center']) !!}
                            {!! Form::search('search', request('search'), ['class' => 'form-control form-control-sm rounded-end-0 border-success ', 'placeholder' => 'Search for something', 'aria-label' => '検索']) !!}
                            {!! Form::button('検索', ['type' => 'submit', 'class' => 'btn btn-sm btn-success text-nowrap rounded-start-0 px-1 me-2 fs-6']) !!}
                        {!! Form::close() !!}
                    </div>

                    <!-- 後でここに新規記事作成ボタンを入れる -->

                    <!-- 人マーク -->
                    @auth
                        <div class="dropdown">
                            <a class="btn btn-outline-secondary dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                                <i class="far fa-user-circle"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
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
