@include('partials.head')
<body style="background-color: #e9ecef;">
<div id="app">
    <nav class="fixed-top navbar border-bottom border-secondary-subtle bg-dark">
        <div class="container-fluid">
            <div class="d-flex justify-content-between w-100">

                <!-- 左寄せ -->
                <div class="d-flex align-items-center">
                    <!-- アプリ名 -->
                    <span class="card-title text-start text-white" style="font-family: 'Poppins', sans-serif;">
                        <span class="fs-1 fw-bold ms-3">K</span><span class="fs-1">ita</span>
                    </span>
                    @if (Auth::guard('admin')->check())
                        <!-- 管理者管理ボタン -->
                        <a href="{{ route('admin.users.index') }}" class="text-white text-decoration-none ms-5">
                            管理者管理
                        </a>
                    @endif
                </div>

                <!-- 右寄せ -->
                <div class="d-flex align-items-center ms-auto">
                    @if (Auth::guard('admin')->check())
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm">
                                ログアウト
                            </button>
                        </form>
                    @endif
                </div>
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
