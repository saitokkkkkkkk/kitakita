@include('partials.head')
<body class="sidebar-mini" style="height: auto;">
<div class="wrapper">
    <!--navバー-->
    <nav class="mb-4 navbar-dark bg-dark main-header navbar navbar-expand navbar-white navbar-light">

        <!--管理ボタン-->
        <ul class="navbar-nav">
            <li class="nav-item me-4">
                <a class="nav-link ms-3" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('admin.users.index') }}" class="nav-link">管理者管理</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('admin.members.index') }}" class="nav-link">会員管理</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('admin.tags.index') }}" class="nav-link">タグ管理</a>
            </li>
        </ul>

        <!--画面拡大とログアウトボタン-->
        <ul class="navbar-nav ml-auto">
            <!--画面拡大-->
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <!--ログアウト-->
            <li class="nav-item me-2">
                <form method="POST" action="{{ route('admin.logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-link nav-link" style="color: red;">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </li>
        </ul>
    </nav>

    <!--サイドバー-->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <!--Kitaマーク-->
        <a class="brand-link" style="text-decoration: none;">
            <img src="{{ asset('スクリーンショット 2024-09-12 11.02.24.png') }}" alt="Logo" class="brand-image img-circle elevation-3">
            <span class="brand-text font-weight-light" style="font-family: 'Poppins', sans-serif;">K</span><span class="brand-text font-weight-light" style="font-family: 'Poppins', sans-serif;">ita</span>
        </a>

        <!--管理ボタン-->
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!--管理者-->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-solid fa-user-tie"></i>
                            <p>
                                管理者
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                            <li class="nav-item">
                                <a href="{{ route('admin.users.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>一覧・検索</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.users.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>新規登録</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--会員-->
                    <li class="nav-item">
                        <a href="{{ route('admin.members.index') }}" class="nav-link">
                            <i class="nav-icon far fa-solid fa-address-book"></i>
                            <p>
                                会員一覧・検索
                            </p>
                        </a>
                    </li>
                    <!--タグ-->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-solid fa-tag"></i>
                            <p>
                                タグ
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                            <li class="nav-item">
                                <a href="{{ route('admin.tags.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>一覧・検索</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.tags.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>新規登録</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <div class="content-wrapper">
        <main>
            @yield('content')
        </main>
    </div>
</div>
</body>


