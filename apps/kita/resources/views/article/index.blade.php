@extends('layouts.app')

@section('content')
    <div class="bg-custom-gray min-vh-100 d-flex flex-column justify-content-between">
        <div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="index col-md-8 my-5">
                        <div class="card p-4 my-5 mw-100">
                            @if($noArticles)
                                <div class="alert alert-warning" role="alert">
                                    記事が存在しません
                                </div>
                            @else
                            <div class="list-group-flush mb-8 font-color">
                                @foreach($articles as $article)
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
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-center my-4 custom-pagination">
                                {{ $articles->links('vendor.pagination.simple') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="py-3"></footer> <!-- これで下部に空間を作り、背景色を適用 -->
    </div>
@endsection
