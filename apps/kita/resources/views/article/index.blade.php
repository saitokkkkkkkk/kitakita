@extends('layouts.app')

@section('content')
    <div class="min-vh-100 d-flex flex-column justify-content-between">
        <div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @include('vendor.alerts.alerts')
                        <div class="card p-4 w-100">
                            @if($articles->isEmpty())
                                <div class="alert alert-warning" role="alert">
                                    記事が存在しません
                                </div>
                            @else
                            <div class="list-group-flush mb-8 font-color">
                                @foreach($articles as $article)
                                    <!-- 記事詳細に遷移可能にする -->
                                    <a href="{{ route('article.details', $article->id) }}" class="text-dark text-decoration-none">
                                        <small class="text-muted mb-0 d-block">
                                            {{ $article->member->name }}が{{ $article->created_at->format('Y年m月d日') }}に投稿
                                        </small>
                                        <strong class="article-title">{{ $article->title }}</strong>
                                        <div>
                                            @foreach ($article->tags as $tag)
                                                <span class="badge bg-primary badge-rounded">{{ $tag->name }}</span>
                                            @endforeach
                                        </div>
                                        <!-- 下線を追加 -->
                                        @if(!$loop->last)
                                            <hr class="my-2.5"> <!-- 上下のマージンを設定 -->
                                        @endif
                                    </a>
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-center custom-pagination mt-4 mb-0">
                                {{ $articles->links('vendor.pagination.simple') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
