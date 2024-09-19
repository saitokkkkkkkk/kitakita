@extends('layouts.app')

@section('content')
    <div class="min-vh-100 d-flex flex-column justify-content-between">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('vendor.alerts.success')
                    @include('vendor.alerts.error')
                    <form id="bulk-delete-form" method="POST" action="{{ route('articles.bulkDelete') }}">
                        @csrf
                        @method('DELETE')
                        <!--一括削除のボタン-->
                        <div class="d-flex justify-content-end mb-3">
                            <button type="submit" class="btn btn-primary">選択した記事を削除</button>
                        </div>
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
                                        <div class="d-flex justify-content-between text-muted mb-1">
                                            <small>{{ $article->member->name }}が{{ $article->created_at->format('Y年m月d日') }}に投稿</small>

                                            <!--ログインしてるかつ自分の記事なら、チェックボックスと削除ボタン表示-->
                                            @if (auth()->check() && auth()->user()->id === $article->member_id)
                                            <div class="article" data-id="{{ $article->id }}">
                                                <div class="d-flex align-items-center">
                                                    <!--一括削除用のチェックボックス-->
                                                    <input type="checkbox" name="articles[]" value="{{ $article->id }}" class="form-check-input me-3 mt-0">
                                                    <!--単体削除用のボタン-->
                                                    <small class="cursor-pointer delete-button" data-id="{{ $article->id }}">
                                                        削除
                                                    </small>
                                                </div>
                                            </div>
                                            @endif

                                        </div>
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
                        </div>
                        <div class="d-flex justify-content-center custom-pagination mt-4 mb-0">
                            {{ $articles->links('vendor.pagination.simple') }}
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
