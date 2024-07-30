{{-- resources/views/articles/form.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-8 col-lg-6 col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <!-- 例外出た時のメッセージ -->
                        @if ($errors->has('error'))
                            <div class="alert alert-danger">
                                {{ $errors->first('error') }}
                            </div>
                        @endif

                        {!! Form::open(['route' => $formRoute, 'method' => $formMethod]) !!}
                        @csrf

                        <!-- タイトル -->
                        <div class="form-group">
                            {!! Form::label('title', 'タイトル') !!}
                            {!! Form::text('title', old('title'), ['class' => 'form-control custom-border']) !!}
                            @error('title')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- タグ -->
                        <div class="form-group">
                            {!! Form::label('tags', 'タグ') !!}
                            {!! Form::select('tags[]', $tags->pluck('name', 'id'), old('tags'), ['class' => 'form-control custom-border', 'multiple' => 'multiple']) !!}
                            @error('tags')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- 記事内容 -->
                        <div class="form-group">
                            {!! Form::label('contents', '記事内容') !!}
                            {!! Form::textarea('contents', old('contents'), ['class' => 'form-control custom-border', 'rows' => 10]) !!}
                            @error('contents')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- ボタン -->
                        <div class="text-right">
                            {!! Form::submit($submitButtonText, ['class' => 'btn btn-success btn-rounded']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
