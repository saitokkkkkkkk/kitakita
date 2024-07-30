@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-8 col-lg-6 col-xl-8">
                <!-- 成功メッセージの表示 -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <!-- 何かのエラー出た時のメッセージ -->
                        @if ($errors->has('error'))
                            <div class="alert alert-danger">
                                {{ $errors->first('error') }}
                            </div>
                        @endif
                        <!-- 保存後の画面（after-saving.blade.php）ではフォームを無効にする -->
                        @if($formRoute && $formMethod)
                            {!! Form::open(['route' => $formRoute, 'method' => $formMethod]) !!}
                            @csrf
                        @endif
                        <!-- タイトル -->
                        <div class="form-group">
                            {!! Form::label('title', 'タイトル', ['for' => 'title']) !!}
                            {!! Form::text('title', old('title'), ['class' => 'form-control custom-border', 'id' => 'title']) !!}
                            @error('title')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- タグ -->
                        <div class="form-group">
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
                        <div class="form-group">
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

                        <!-- 保存後の画面（after-saving.blade.php）ではボタンのルートを変更 -->
                        @if($formRoute && $formMethod && $submitButtonText)
                            <div class="text-right">
                                {!! Form::submit($submitButtonText, ['class' => 'btn btn-success btn-rounded']) !!}
                            </div>
                            {!! Form::close() !!}
                        @else
                            @if($submitButtonText)
                                <div class="text-right">
                                    <a href="{{ route('articles.index') }}" class="btn btn-success btn-rounded">{{ $submitButtonText }}</a>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
