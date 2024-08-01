@extends('layouts.app')

@section('content')
    <div class="container profile-edit-container">

        <!-- サクセスメッセージの表示 -->
        @if (session('success'))
            <div class="alert alert-success">
                {!! session('success') !!}
            </div>
        @endif

        <div class="card">
            <h2>プロフィール編集</h2>

            {!! Form::open(['route' => 'member.profile.update', 'method' => 'PUT']) !!}
            <div class="form-group">
                {!! Form::label('name', 'ユーザー名') !!}
                {!! Form::text('name', old('name', $name), ['class' => 'form-control']) !!}

                <!-- ユーザー名のエラーメッセージ -->
                @if ($errors->has('name'))
                    <div class="text-danger">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('email', 'メールアドレス') !!}
                {!! Form::email('email', old('email', $email), ['class' => 'form-control']) !!}

                <!-- メールアドレスのエラーメッセージ -->
                @if ($errors->has('email'))
                    <div class="text-danger">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            {!! Form::submit('更新する', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
