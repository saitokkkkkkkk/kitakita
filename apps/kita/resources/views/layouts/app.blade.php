@include('partials.head')
<body class="bg-light">
<div id="app">
    <nav class="fixed-top navbar border-bottom border-secondary-subtle bg-white">
        <div class="container">
            <div class="w-100 row justify-content-center">
                <div class="col-md-8 d-flex justify-content-between align-items-center">
                    <!-- アプリ名 -->
                    <a class="rounded-circle bg-success text-decoration-none d-flex justify-content-center align-items-center" href="{{ route('articles.index') }}" style="width: 100px; height: 50px;">
                        <div class="text-white fs-2 fw-light">{{ config('app.name', 'Kita') }}</div>
                    </a>
                    <!--検索窓 -->
                    <!--記事作成(auth)-->
                    @auth
                        <!-- 人マーク -->
                        <div class="dropdown">
                            <a class="btn btn-success btn-sm" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                                <i class="far fa-user-circle"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <!-- ここに「プロフィール編集」 -->
                                <!--ログアウト-->
                                <li>
                                    {!! Form::open(['route' => 'logout', 'method' => 'post', 'id' => 'logout-form']) !!}
                                        @csrf
                                        {!! Form::button('ログアウト', ['type' => 'submit', 'class' => 'dropdown-item text-primary py-0 pl-3']) !!}
                                    {!! Form::close() !!}
                                </li>
                            </ul>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    <!-- ダミー要素 -->
    <div style="height: 100px;"></div>
    <main>
        @yield('content')
    </main>
</div>
</body>
