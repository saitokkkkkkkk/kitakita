@extends('layouts.app')

@section('content')
    <div class="bg-custom-gray">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card p-4">
                        <div class="list-group-flush mb-8 font-color">
                            @foreach($articles as $article)
                                <p class="small text-muted mb-0">
                                    {{ $article->member->name }}が{{ $article->created_at->format('Y年m月d日') }}に投稿
                                </p>
                                <strong  class="article-title">{{ $article->title }}</strong>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
