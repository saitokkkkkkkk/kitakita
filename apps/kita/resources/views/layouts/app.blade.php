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
                    <!--検索窓 -->
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
    <main class="mt-10">
        @yield('content')
    </main>
</div>
</body>
