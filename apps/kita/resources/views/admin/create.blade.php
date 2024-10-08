@extends('layouts.admin')

@section('content')
    <div class="mx-4">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-12">
                <h2 class="mb-4">管理者管理 - 新規登録</h2>
                <div class="row">

                    <!-- フォーム入力欄 -->
                    <div class="col-sm-9 mb-3">
                        <div class="card">
                            <div class="card-body">
                                {!! Form::open(['route' => 'admin.users.store', 'method' => 'POST']) !!}
                                @csrf
                                <div class="form-group mb-3">
                                    <span class="badge bg-danger rounded-1 px-1 mb-2">必須</span>
                                    {!! Form::text('last_name', old('last_name'), ['class' => 'form-control form-control-border', 'placeholder' => '姓']) !!}
                                    @error('last_name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <span class="badge bg-danger rounded-1 px-1 mb-2">必須</span>
                                    {!! Form::text('first_name', old('first_name'), ['class' => 'form-control form-control-border', 'placeholder' => '名']) !!}
                                    @error('first_name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <span class="badge bg-danger rounded-1 px-1 mb-2">必須</span>
                                    {!! Form::text('email', old('email'), ['class' => 'form-control form-control-border', 'placeholder' => 'メールアドレス']) !!}
                                    @error('email')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <span class="badge bg-danger rounded-1 px-1 mb-2">必須</span>
                                    {!! Form::password('password', ['class' => 'form-control form-control-border', 'placeholder' => 'パスワード']) !!}
                                    @error('password')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <span class="badge bg-danger rounded-1 px-1 mb-2">必須</span>
                                    {!! Form::password('password_confirmation', ['class' => 'form-control form-control-border', 'placeholder' => 'パスワード（確認用）']) !!}
                                    @error('password_confirmation')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 登録ボタン -->
                    <div class="col-sm-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <!-- ボタン -->
                                <div>
                                    {!! Form::submit('登録する', ['class' => 'btn btn-primary w-100']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
