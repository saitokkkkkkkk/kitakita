@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('articles.store') }}" method="POST">
                            @csrf

                            <!-- タイトル -->
                            <div class="form-group">
                                <label for="title">タイトル</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                            </div>

                            <!-- タグ -->
                            <div class="form-group">
                                <label for="tags">タグ</label>
                                <select name="tags[]" id="tags" class="form-control" multiple>
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- 記事内容 -->
                            <div class="form-group">
                                <label for="content">記事内容</label>
                                <textarea name="content" id="content" class="form-control" rows="10">{{ old('content') }}</textarea>
                            </div>

                            <!-- 投稿ボタン -->
                            <div class="text-left">
                                <button type="submit" class="btn btn-success">投稿する</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
