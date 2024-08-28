@extends('layouts.admin')

@section('content')
    <div class="mx-4">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-12">
                <h2 class="my-5">タグ管理 - 新規登録</h2>
                <div class="row">

                    <!-- フォーム入力欄 -->
                    <div class="col-sm-9 mb-3">
                        <div class="card">
                            <div class="card-body">
                                {!! Form::open(['route' => 'admin.tags.store', 'method' => 'POST']) !!}
                                @csrf
                                <div class="form-group mb-3">
                                    <div class="d-flex align-items-center">
                                        {!! Form::label('tag', 'タグ名', ['class' => 'me-2']) !!}
                                        <span class="badge bg-danger rounded-1 px-1">必須</span>
                                    </div>
                                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                                    @error('name')
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
