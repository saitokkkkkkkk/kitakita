@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- エラーメッセージ -->
                @include('vendor.alerts.success')
                @include('vendor.alerts.error')
                <div>
                    <h1>管理者管理</h1>
                </div>
                <!-- 検索 -->
                <div class="card my-4 overflow-hidden">
                    <!-- 検索機能 -->
                    {!! Form::open(['route' => 'admin.users.index', 'method' => 'get']) !!}
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-4">
                                {!! Form::text('last_name', request('last_name'), ['id' => 'last_name', 'class' => 'form-control form-control-border', 'placeholder' => '姓']) !!}
                            </div>
                            <div class="col-md-4">
                                {!! Form::text('first_name', request('first_name'), ['id' => 'first_name', 'class' => 'form-control form-control-border', 'placeholder' => '名']) !!}
                            </div>
                            <div class="col-md-4">
                                {!! Form::text('email', request('email'), ['id' => 'email', 'class' => 'form-control form-control-border', 'placeholder' => 'メールアドレス']) !!}
                            </div>
                        </div>
                    </div>
                    <div style="background-color: #e9ecef;">
                        <hr class="border-secondary">
                        <div class="d-flex justify-content-center">
                            {!! Form::submit('検索', ['class' => 'btn btn-primary px-3 mb-3']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                @if($adminUsers->isEmpty())
                    <div class="alert alert-warning" role="alert">
                        管理者が存在しません
                    </div>
                @else
                <!-- ページネーション -->
                <div class="d-flex justify-content-start custom-pagination mb-0">
                    {{ $adminUsers->links('vendor.pagination.admin') }}
                </div>
                <!--管理者テーブル-->
                <div class="card">
                    <div class="d-flex justify-content-start">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary px-3 m-4">
                            新規登録
                        </a>
                    </div>
                    <div class="card overflow-hidden mx-4">
                        <div class="card-body table-responsive p-0">

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="px-4">名前</th>
                                    <th class="px-4">メールアドレス</th>
                                    <th class="text-end">更新日時</th>
                                    <th class="text-end">登録日時</th>
                                    <th class="text-nowrap text-center">レコード操作</th>
                                </tr>
                                <tbody>
                                @foreach($adminUsers as $user)
                                    <tr>
                                        <td class="text-center align-middle">{{ $user->id }}</td>
                                        <td class="px-4 align-middle">{{ $user->last_name }} {{ $user->first_name }}</td>
                                        <td class="px-4 align-middle">{{ $user->email }}</td>
                                        <td class="text-end align-middle">{{ $user->updated_at->format('Y/m/d H:i') }}</td>
                                        <td class="text-end align-middle">{{ $user->created_at->format('Y/m/d H:i') }}</td>
                                        <td>
                                            <!-- 編集ボタン -->
                                            <div class="d-flex justify-content-center align-middle ">
                                                <a href="{{ route('admin.users.edit', ['adminUser' => $user->id]) }}" class="btn btn-primary px-3 py-1 text-nowrap">
                                                    編集
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
@endsection
