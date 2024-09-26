@extends('layouts.admin')

@section('content')
    <div class="mx-4">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-12">
                <h2 class="mb-3">タグ管理 - 更新</h2>
                @include('vendor.alerts.success')
                @include('vendor.alerts.error')
                <div class="row">
                    <div class="col-sm-9 mb-3">
                        <div class="card">
                            <div class="card-body">
                                {!! Form::open(['route' => ['admin.tags.update', $articleTag], 'method' => 'PUT']) !!}
                                @csrf
                                <!-- ID -->
                                <div class="form-group m-3">
                                    {!! Form::label('id', 'ID', ['class' => 'me-2']) !!}
                                    {!! Form::text('id', $articleTag->id, ['class' => 'form-control mb-3', 'disabled' => 'disabled', 'style' => 'background-color: #e8e8e8;']) !!}
                                </div>
                                <!-- タグ名 -->
                                <div class="form-group m-3">
                                    <div class="d-flex align-items-center">
                                        {!! Form::label('name', 'タグ名', ['class' => 'me-2']) !!}
                                        <span class="badge bg-danger rounded-1 px-1 mb-1">必須</span>
                                    </div>
                                    {!! Form::text('name', old('name', $articleTag->name), ['class' => 'form-control form-control-border', 'placeholder' => 'タグ名']) !!}
                                    @error('name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- 更新日時 -->
                                <div class="form-group m-3">
                                    {!! Form::label('updated_at', '更新日時', ['class' => 'me-2']) !!}
                                    {!! Form::text('updated_at', $articleTag->updated_at->format('Y/m/d H:i:s'), ['class' => 'form-control mb-3', 'disabled' => 'disabled', 'style' => 'background-color: #e8e8e8;']) !!}
                                </div>
                                <!-- 登録日時 -->
                                <div class="form-group m-3">
                                    {!! Form::label('created_at', '登録日時', ['class' => 'me-2']) !!}
                                    {!! Form::text('created_at', $articleTag->created_at->format('Y/m/d H:i:s'), ['class' => 'form-control mb-3', 'disabled' => 'disabled', 'style' => 'background-color: #e8e8e8;']) !!}
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
                                    {!! Form::submit('更新する', ['class' => 'btn btn-primary w-100 mb-3']) !!}
                                </div>
                                {!! Form::close() !!}

                                <!-- 削除ボタン（削除機能作成の時に再度触る） -->
                                {!! Form::open(['route' => ['admin.tags.destroy', $articleTag->id], 'method' => 'DELETE', 'class' => 'delete-form']) !!}
                                {!! Form::submit('削除する', ['class' => 'btn btn-danger w-100']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
