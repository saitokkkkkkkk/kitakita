@include('partials.head')
<body style="background-color: #e9ecef;">
<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-sm-7 col-md-6 col-lg-4">
            <div class="text-center mb-3">
                <span class="text-start" style="font-family: 'Poppins', sans-serif;">
                    <span class="fs-1 fw-bold">K</span><span class="fs-1">ita</span>
                    <span class="fs-5 ms-2">Administrator Console</span>
                </span>
            </div>
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => 'admin.login', 'method' => 'POST']) !!}
                    @csrf
                    <!--メアド-->
                    <div class="form-group mb-4">
                        {!! Form::label('email', 'メールアドレス') !!}
                        {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
                        @error('email')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <!--パスワード-->
                    <div class="form-group mb-4">
                        {!! Form::label('password', 'パスワード') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                        @error('password')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <!--ログインボタン-->
                    <div class="text-start">
                        {!! Form::submit('ログイン', ['class' => 'btn btn-primary px-3']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
</body>
