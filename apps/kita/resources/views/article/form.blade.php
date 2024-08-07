@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

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

                        <!-- ボタン -->
                        <div class="text-end">
                            {!! Form::submit('投稿する', ['class' => 'btn btn-success rounded-pill']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
