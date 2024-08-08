@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column justify-content-between">
        <div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card p-4 text-muted">

                            <!-- 削除、編集ボタン（削除、編集機能の時にいじる） -->
                            @if($canEditOrDelete)
                                <div class="text-end p-1 d-flex justify-content-end gap-2">
                                    <form method="POST" action="{{ route('article.destroy', ['article' => $article->id]) }}" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger rounded-pill px-3">削除する</button>
                                    </form>
                                    <!-- 後で記事編集ルートの追加 -->
                                    <a class="btn btn-success rounded-pill px-3">編集する</a>
                                </div>
                            @endif

                            <!-- タイトル -->
                            <strong class="fs-2">{{ $article->title }}</strong>
                            <!-- 投稿者と投稿日 -->
                            <small class="mb-0 d-block mb-4">
                                {{ $article->member->name }}が{{ $article->created_at->format('Y年m月d日') }}に投稿
                            </small>
                            <!-- タグ -->
                            <div class="mb-2">
                                @foreach ($article->tags as $tag)
                                    <span class="badge bg-primary badge-rounded">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                            <!-- 内容 -->
                            <div>{!! nl2br(e($article->contents)) !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
