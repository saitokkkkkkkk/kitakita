@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- エラーメッセージ -->
                @include('vendor.alerts.success')
                @include('vendor.alerts.error')

                <div>
                    <h1>会員管理</h1>
                </div>
                <!-- 会員検索 -->
                <div class="card my-4 overflow-hidden">
                    {!! Form::open(['route' => 'admin.members.index', 'method' => 'get']) !!}
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                {!! Form::label('name', 'ユーザ名', ['class' => 'form-label']) !!}
                                {!! Form::text('name', request('name'), ['id' => 'name', 'class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::label('email', 'メールアドレス', ['class' => 'form-label']) !!}
                                {!! Form::text('email', request('email'), ['id' => 'email', 'class' => 'form-control']) !!}
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
                <!-- ページネーション -->
                <div class="d-flex justify-content-start custom-pagination mt-4 mb-0">
                    {{ $members->links('vendor.pagination.admin') }}
                </div>
                <!-- 会員一覧 -->
                <div class="card">
                    <div class="card-body my-3">
                        @if($members->isEmpty())
                            <div class="alert alert-warning mx-3" role="alert">
                                会員が存在しません
                            </div>
                        @else
                            <div class="table-responsive mx-4">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="px-4 text-nowrap">ユーザ名</th>
                                        <th class="px-4">メールアドレス</th>
                                        <th class="text-end">登録日時</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($members as $member)
                                        <tr>
                                            <td class="text-center align-middle">{{ $member->id }}</td>
                                            <td class="px-4 align-middle">{{ $member->name }}</td>
                                            <td class="px-4 align-middle">{{ $member->email }}</td>
                                            <td class="text-end align-middle">{{ $member->created_at->format('Y/m/d H:i') }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
