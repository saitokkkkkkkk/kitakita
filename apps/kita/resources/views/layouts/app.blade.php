@include('partials.head')
<body class="bg-light">
<div id="app">
    <nav class="fixed-top navbar border-bottom border-secondary-subtle bg-white">
        <div class="container">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 d-flex justify-content-between align-items-center">
                    <!-- アプリ名 -->
                    <a class="rounded-circle bg-success d-flex justify-content-center align-items-center text-decoration-none" href="{{ route('articles.index') }}" style="width: 100px; height: 50px;">
                        <div class="text-white fs-2 fw-light">{{ config('app.name', 'Kita') }}</div>
                    </a>
                    <!--検索窓 -->
                    <!--記事作成(auth)-->
                    @auth
                        <!-- 人マーク -->
                        <div class="dropdown">
                            <a class="btn btn-success btn-sm" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="far fa-user-circle"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <!-- ここに「プロフィール編集」 -->
                                <!--ログアウト-->
                                <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-primary py-0 pl-3">ログアウト</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    <main class="my-5">
        @yield('content')
    </main>
</div>
</body>
