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
                                {!! Form::text('name', request('name'), ['id' => 'name', 'class' => 'form-control form-control-border', 'placeholder' => 'タグ名']) !!}
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
                        <!--タグテーブル-->
                        <div class="card overflow-hidden mx-4">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th class="text-center text-nowrap">ID</th>
                                        <th class="px-4 text-nowrap">タグ名</th>
                                        <th class="text-end text-nowrap">更新日時</th>
                                        <th class="text-nowrap text-center">レコード操作</th>
                                    </tr>
                                    <tbody>
                                    @foreach($articleTags as $tag)
                                        <tr>
                                            <td class="text-center align-middle">{{ $tag->id }}</td>
                                            <td class="px-4 align-middle">{{ $tag->name }}</td>
                                            <td class="text-end align-middle">{{ $tag->updated_at->format('Y/m/d H:i') }}</td>
                                            <td>
                                                <!-- 編集ボタン -->
                                                <div class="d-flex justify-content-center align-middle">
                                                    <a href="{{ route('admin.tags.edit', ['articleTag' => $tag->id]) }}" class="btn btn-primary px-3 py-1 text-nowrap">
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
