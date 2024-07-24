<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitaログイン</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-8 col-lg-6">
            <div class="text-center">
                <h3
                    class="card-title text-left text-muted"
                    style="font-family: 'Poppins', sans-serif; margin-bottom: 20px; text-align: left; color: #6c757d;">
                    Kitaログイン
                </h3>
                <hr>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="mb-3 text-right">
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
                        <div class="form-group">
                            {!! Form::label('password', 'パスワード') !!}
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                            @error('password')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!--ログインボタン-->
                        <div class="text-left">
                            {!! Form::submit('ログイン', ['class' => 'btn', 'style' => 'background-color: #8cbf6d; color: white; border-color: #8cbf6d;']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
</body>
