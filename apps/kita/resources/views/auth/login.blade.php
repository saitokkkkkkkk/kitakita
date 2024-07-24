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
                <h3 class="card-title text-left text-muted">Kitaログイン</h3>
                <hr>
            </div>
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => 'login', 'method' => 'POST']) !!}
                        @csrf
                        <!--メアド-->
                        <div class="form-group">
                            {!! Form::label('email', 'メールアドレス') !!}
                            {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
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
                            {!! Form::submit('ログイン', ['class' => 'btn btn-success']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
</body>
