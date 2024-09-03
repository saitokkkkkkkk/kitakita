@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- エラーメッセージ -->
                @include('vendor.alerts.success')
                @include('vendor.alerts.error')

                <div>
                    <h1>タグ管理</h1>
                </div>
                <!-- 検索 -->
                <div class="card my-4 overflow-hidden">
                    <!-- 検索機能 -->
                    {!! Form::open(['route' => 'admin.tags.index', 'method' => 'get']) !!}
                    <div class="card-body">
                        <div class="row g-3">
                            <div>
                                {!! Form::label('name', 'タグ', ['class' => 'form-label']) !!}
                                {!! Form::text('name', request('name'), ['id' => 'name', 'class' => 'form-control']) !!}
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
                    {{ $articleTags->links('vendor.pagination.admin') }}
                </div>
                <!-- タグ一覧 -->
                <div class="card">
                    <div class="d-flex justify-content-start">
                        <a href="{{ route('admin.tags.create') }}" class="btn btn-primary px-3 m-4">
                            新規登録
                        </a>
                    </div>
                    <!-- タグテーブル -->
                    @if($articleTags->isEmpty())
                        <div class="alert alert-warning mx-3" role="alert">
                            タグが存在しません
                        </div>
                    @else
                        <div class="table-responsive mx-4">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="px-4">タグ名</th>
                                    <th class="text-end">登録日時</th>
                                    <th class="text-nowrap text-center">レコード操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($articleTags as $tag)
                                    <tr>
                                        <td class="text-center align-middle">{{ $tag->id }}</td>
                                        <td class="px-4 align-middle">{{ $tag->name }}</td>
                                        <td class="text-end align-middle">{{ $tag->created_at->format('Y/m/d H:i') }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center">
                                                {{-- タグ編集機能マージ後、遷移可能にするためにルート追加 --}}
                                                <a class="btn btn-primary px-3 py-1">
                                                    編集
                                                </a>
                                            </div>
                                        </td>
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
@endsection
