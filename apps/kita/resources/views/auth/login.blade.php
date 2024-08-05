@include('partials.head')
<body>
<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-8">
            <div class="text-center">
                <h3 class="card-title text-start text-muted">
                    Kitaログイン
                </h3>
                <hr>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="mb-3 text-end">
                        新規会員登録は<a href="{{ route('show.registration') }}">こちら</a>
                    </div>
                    {!! Form::open(['route' => 'login', 'method' => 'POST']) !!}
                        @csrf
                        <!--メアド-->
                        <div class="form-group">
                            {!! Form::label('email', 'メールアドレス') !!}
                            {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
                            @error('email')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!--パスワード-->
                        <div class="form-group mb-2">
                            {!! Form::label('password', 'パスワード') !!}
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                            @error('password')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!--ログインボタン-->
                        <div class="text-start">
                            {!! Form::submit('ログイン', ['class' => 'btn btn-success']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
</body>
