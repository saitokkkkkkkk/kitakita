@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <!-- 成功メッセージの表示 -->
                @if($successMessage)
                    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert" id="success-alert">
                        {!! $successMessage !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- 保存後のデータを埋め込む -->
                @if(session('article_data'))
                    <div id="article-data"
                         data-title="{{ session('article_data')['title'] }}"
                         data-contents="{{ session('article_data')['contents'] }}"
                         data-tags="{{ json_encode(session('article_data')['tags']) }}">
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <!-- フォーム開始 -->
                        {!! Form::open(['route' => 'articles.store', 'method' => 'post']) !!}

                        <!-- タイトル -->
                        <div class="form-group mb-3">
                            {!! Form::label('title', 'タイトル', ['for' => 'title']) !!}
                            {!! Form::text('title', old('title'), ['class' => 'form-control custom-border', 'id' => 'title']) !!}
                            @error('title')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- タグ -->
                        <div class="form-group mb-3">
                            {!! Form::label('tags', 'タグ', ['for' => 'tags']) !!}
                            {!! Form::select('tags[]', $tags->pluck('name', 'id'), old('tags'), [
                                'class' => 'form-control custom-border',
                                'id' => 'tags',
                                'multiple' => 'multiple' //複数選択可能に
                            ]) !!}
                            @error('tags')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- 記事内容 -->
                        <div class="form-group mb-3">
                            {!! Form::label('contents', '記事内容', ['for' => 'contents']) !!}
                            {!! Form::textarea('contents', old('contents'), [
                                'class' => 'form-control custom-border',
                                'rows' => 10,
                                'id' => 'contents'
                            ]) !!}
                            @error('contents')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="text-end">
                            {!! Form::submit('保存する', ['class' => 'btn btn-success rounded-pill']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
