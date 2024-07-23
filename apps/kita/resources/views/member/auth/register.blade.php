<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kita会員登録</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rounded+Mplus:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .btn-custom-success {
            background-color: #8bc34a; /* 濃い緑色 */
            border-color: #7cb342; /* 濃い緑色の境界線 */
            color: #ffffff; /* ボタン文字の色を白に */
        }

        .btn-custom-success:hover {
            background-color: #7cb342; /* ホバー時の濃い緑色 */
            border-color: #689f38; /* ホバー時の濃い緑色の境界線 */
            color: #ffffff; /* ホバー時の文字色を白に */
        }
        .card-title {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-8 col-lg-6">
            <div class="text-center">
                <h3 class="card-title text-left text-muted">Kita会員登録</h3>
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
                    <!-- ボタンを左端へ -->
                    <div class="text-left">
                        {!! Form::submit('登録する', ['class' => 'btn btn-custom-success']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
