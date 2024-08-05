@include('partials.head')
<body class="bg-light">
<div id="app">
    <nav class="fixed-top navbar border-bottom border-secondary-subtle bg-white">
        <div class="container">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 d-flex align-items-center justify-content-between">
                    <!-- アプリ名 -->
                    <a class="rounded-circle bg-success d-flex justify-content-center align-items-center text-decoration-none" href="{{ route('articles.index') }}" style="width: 100px; height: 50px;">
                        <div class="text-white fs-2 fw-light">{{ config('app.name') }}</div>
                    </a>
                    <!-- 右寄せにする要素を入れる -->
                    <div class="d-flex">
                        <!-- ここに検索窓 -->
                        @auth
                            <!-- 576px未満の時 -->
                            <div class="d-sm-none">
                                <!-- ここにペン -->
                                <!-- ここに虫眼鏡 -->
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-success  d-sm-none me-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end p-2">
                                        {!! Form::open(['route' => 'articles.index', 'method' => 'GET', 'class' => 'd-flex align-items-center']) !!}
                                        {!! Form::search('search', request('search'), ['class' => 'form-control form-control-sm border-success rounded-end-0', 'placeholder' => 'Search for something']) !!}
                                        {!! Form::button('<i class="fas fa-search"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-success rounded-start-0 px-1 me-2']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>

                            <!-- 576px以上の時 -->
                            <div class="d-none d-sm-flex">
                                <!-- ここに記事作成ボタン -->
                                <!-- ここに検索フォーム -->
                                <div id="search-form" class="d-none d-sm-flex align-items-center py-3">
                                    {!! Form::open(['route' => 'articles.index', 'method' => 'GET', 'class' => 'd-flex align-items-center']) !!}
                                    {!! Form::search('search', request('search'), ['class' => 'form-control form-control-sm rounded-end-0 border-success', 'placeholder' => 'Search for something', 'aria-label' => '検索']) !!}
                                    {!! Form::button('検索', ['type' => 'submit', 'class' => 'btn btn-sm btn-success text-nowrap rounded-start-0 px-1 me-2']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>

                            <!-- 人 -->
                            <div class="dropdown d-flex align-items-center">
                                <a class="btn btn-sm btn-success" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="far fa-user-circle"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                    <!-- ここにプロフィール編集 -->
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
