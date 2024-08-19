@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @include('vendor.alerts.success')
                @include('vendor.alerts.error')

                <div class="card">
                    <div>
                        <h2 class="mb-0 mt-3 ms-4 text-secondary">プロフィール編集</h2>
                        <div class="border-bottom border-dark border-secondary my-3 mx-3"></div>
                    </div>

                    <div class="card-body">
                        {!! Form::open(['route' => 'member.profile.update', 'method' => 'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'ユーザー名') !!}
                            {!! Form::text('name', old('name', $name), ['class' => 'form-control mb-3']) !!}

                            <!-- ユーザー名のバリデーションエラーメッセージ -->
                            @if ($errors->has('name'))
                                <div class="text-danger">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'メールアドレス') !!}
                            {!! Form::email('email', old('email', $email), ['class' => 'form-control']) !!}

                            <!-- メールアドレスのバリデーションエラーメッセージ -->
                            @if ($errors->has('email'))
                                <div class="text-danger">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>

                        <!-- ここに後でパスワード更新 -->

                        <div class="text-end mb-4 mt-5">
                            {!! Form::submit('更新する', ['class' => 'btn rounded-pill btn-success']) !!}
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
