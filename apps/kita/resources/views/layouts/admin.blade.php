@include('partials.head')
<body>
<div>
<nav class="mb-3 main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
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

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>

</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!--サイドバーのKita-->
    <span class="brand-link text-start text-white" style="font-family: 'Poppins', sans-serif;">
        <span class="fs-1 fw-bold ms-3">K</span><span class="fs-1">ita</span>
    </span>

    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link">
                        <i class="nav-icon far fa-solid fa-user-tie"></i>
                        <p>
                            管理者管理
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.members.index') }}" class="nav-link">
                        <i class="nav-icon far fa-solid fa-address-book"></i>
                        <p>
                            会員管理
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.tags.index') }}" class="nav-link">
                        <i class="nav-icon far fa-solid fa-tag"></i>
                        <p>
                            タグ管理
                        </p>
                    </a>
                </li>

            </ul>
        </nav>

    </div>
</aside>

<main>
    @yield('content')
</main>
</div>
</body>


