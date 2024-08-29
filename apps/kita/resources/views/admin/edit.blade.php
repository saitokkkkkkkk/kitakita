@extends('layouts.admin')

@section('content')
    <div class="mx-4">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-12">
                <h2 class="mb-3">管理者管理 - 更新</h2>
                @include('vendor.alerts.success')
                @include('vendor.alerts.error')
                <div class="row">
                    <div class="col-sm-9 mb-3">
                        <div class="card">
                            <div class="card-body">
                                {!! Form::open(['route' => ['admin.users.update', $adminUser], 'method' => 'PUT']) !!}
                                @csrf
                                <!-- ID -->
                                <div class="form-group m-3">
                                    {!! Form::label('id', 'ID', ['class' => 'me-2']) !!}
                                    {!! Form::text('id', $adminUser->id, ['class' => 'form-control mb-3 text-muted', 'disabled' => 'disabled', 'style' => 'background-color: #e8e8e8;']) !!}
                                </div>
                                <!-- 姓 -->
                                <div class="form-group m-3">
                                    <div class="d-flex align-items-center">
                                        {!! Form::label('last_name', '姓', ['class' => 'me-2']) !!}
                                        <span class="badge bg-danger rounded-1 px-1 mb-1">必須</span>
                                    </div>
                                    {!! Form::text('last_name', old('last_name', $adminUser->last_name), ['class' => 'form-control']) !!}
                                    @error('last_name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- 名 -->
                                <div class="form-group m-3">
                                    <div class="d-flex align-items-center">
                                        {!! Form::label('first_name', '名', ['class' => 'me-2']) !!}
                                        <span class="badge bg-danger rounded-1 px-1 mb-1">必須</span>
                                    </div>
                                    {!! Form::text('first_name', old('first_name', $adminUser->first_name), ['class' => 'form-control']) !!}
                                    @error('first_name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- メアド -->
                                <div class="form-group m-3">
                                    <div class="d-flex align-items-center">
                                        {!! Form::label('email', 'メールアドレス', ['class' => 'me-2']) !!}
                                        <span class="badge bg-danger rounded-1 px-1 mb-1">必須</span>
                                    </div>
                                    {!! Form::email('email', old('email', $adminUser->email), ['class' => 'form-control']) !!}
                                    @error('email')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- パスワード -->
                                <div class="form-group m-3">
                                    <div class="mb-3">パスワード</div>
                                    <div>*****</div>
                                </div>
                                <!-- 更新日時 -->
                                <div class="form-group m-3">
                                    {!! Form::label('updated_at', '更新日時', ['class' => 'me-2']) !!}
                                    {!! Form::text('updated_at', $adminUser->updated_at->format('Y/m/d H:i:s'), ['class' => 'form-control mb-3 text-muted', 'disabled' => 'disabled', 'style' => 'background-color: #e8e8e8;']) !!}
                                </div>
                                <!-- 登録日時 -->
                                <div class="form-group m-3">
                                    {!! Form::label('created_at', '登録日時', ['class' => 'me-2']) !!}
                                    {!! Form::text('created_at', $adminUser->created_at->format('Y/m/d H:i:s'), ['class' => 'form-control mb-3 text-muted', 'disabled' => 'disabled', 'style' => 'background-color: #e8e8e8;']) !!}
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
                                {{--!! Form::open(['route' => ['tags.destroy', $adminUser->id], 'method' => 'DELETE' !!--}}
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
