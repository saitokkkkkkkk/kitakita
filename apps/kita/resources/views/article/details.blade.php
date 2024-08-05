@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column justify-content-between">
        <div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card p-4 text-muted">

                            <!-- 編集・削除ボタン -->
                            @if($canEditOrDelete)
                                <div class="position-absolute top-0 end-0 p-2">
                                    削除する
                                    編集する
                                </div>
                            @endif

                            <!-- タグ -->
                            <strong class="fs-2">{{ $article->title }}</strong>
                            <!-- 投稿者と投稿日 -->
                            <small class="mb-0 d-block mb-4">
                                {{ $article->member->name }}が{{ $article->created_at->format('Y年m月d日') }}に投稿
                            </small>
                            <!--タグ -->
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
