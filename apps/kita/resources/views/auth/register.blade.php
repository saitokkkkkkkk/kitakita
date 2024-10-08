@include('partials.head')
<body style="background-color: #e9ecef;">
<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-9 col-sm-8 col-md-6 col-lg-5">
            <div class="text-center">
                <h3 class="text-start text-muted">
                    Kita会員登録
                </h3>
                <hr>
            </div>
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => 'member.registration', 'method' => 'POST']) !!}
                    @csrf
                    <div class="form-group mb-3">
                        {!! Form::label('name', 'ユーザー名') !!}
                        {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                        @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        {!! Form::label('email', 'メールアドレス') !!}
                        {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
                        @error('email')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        {!! Form::label('password', 'パスワード') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                        @error('password')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        {!! Form::label('password_confirmation', 'パスワード（確認用）') !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                        @error('password_confirmation')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="text-left">
                        {!! Form::submit('登録する', ['class' => 'btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
</body>

