<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kita会員登録</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 100%;
            text-align: left; /* ボタンを左寄せにする */
        }
        .form-title {
            margin-bottom: 20px;
            text-align: left;
            color: #6c757d;
            font-family: 'Poppins', sans-serif;
        }
        .btn-custom {
            background-color: #6abf69;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .btn-custom:hover {
            background-color: #28a745; /* ホバー時の緑 */
            color: white; /* ホバー時の文字の色 */
        }
        /*「Kita会員登録」の下線 */
        .divider {
            border: 0;
            height: 1px;
            background: #e0e0e0;
            margin: 20px 0;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <h3 class="form-title">Kita会員登録</h3>
            <hr class="divider">
            <div class="form-container">
                {!! Form::open(['route' => 'show.registration', 'method' => 'POST']) !!}
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
                {!! Form::submit('登録する', ['class' => 'btn btn-custom']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
</body>
</html>
