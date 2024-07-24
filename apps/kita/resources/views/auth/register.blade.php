<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kita会員登録</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
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
                    Kita会員登録
                </h3>
                <hr>
            </div>
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => 'member.registration', 'method' => 'POST']) !!}
                    @csrf
                    <div class="form-group">
                        {!! Form::label('name', 'ユーザー名') !!}
                        {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                        @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'メールアドレス') !!}
                        {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
                        @error('email')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('password', 'パスワード') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                        @error('password')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('password_confirmation', 'パスワード（確認用）') !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                        @error('password_confirmation')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="text-left">
                        {!! Form::submit('登録する', ['class' => 'btn', 'style' => 'background-color: #8cbf6d; color: white; border-color: #8cbf6d;']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
