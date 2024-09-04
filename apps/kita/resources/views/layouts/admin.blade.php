@include('partials.head')
<body style="background-color: #e9ecef;">
<div id="app">
    <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark border-bottom border-secondary-subtle">
        <div class="container-fluid">
            <!-- アプリ名 -->
            <span class="card-title text-start text-white" style="font-family: 'Poppins', sans-serif;">
                <span class="fs-1 fw-bold ms-3">K</span><span class="fs-1">ita</span>
            </span>

            <!-- トグルボタン -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleContent" aria-controls="navbarToggleContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- ナビゲーションメニュー -->
            <div class="collapse navbar-collapse" id="navbarToggleContent">
                <ul class="navbar-nav me-md-auto mb-2 mb-sm-0">
                    @if (Auth::guard('admin')->check())
                        <!--管理者管理ボタン-->
                        <div class="nav-item d-md-flex text-end ms-5">
                            <a href="{{ route('admin.users.index') }}" class="nav-link text-white text-nowrap ms-3">
                                管理者管理
                            </a>
                        </div>
                        <!--ここに会員管理ボタン-->
                        <!--タグ管理ボタン-->
                        <div class="nav-item d-md-flex text-end ms-4">
                            <a href="{{ route('admin.tags.index') }}" class="nav-link text-white text-nowrap">
                                タグ管理
                            </a>
                        </div>
                    @endif
                </ul>
                <ul class="navbar-nav ms-auto mb-2">
                    @if (Auth::guard('admin')->check())
                        <li class="nav-item text-end">
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-light btn-sm mt-2">
                                    ログアウト
                                </button>
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- ダミー要素 -->
    <div class="d-sm-none" style="height: 80px;"></div>
    <div class="d-none d-sm-flex" style="height: 110px;"></div>

    <main>
        @yield('content')
    </main>
</div>
</body>
