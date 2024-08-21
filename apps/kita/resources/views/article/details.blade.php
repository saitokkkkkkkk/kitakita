@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column justify-content-between">
        <div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">

                        @include('vendor.alerts.success')
                        @include('vendor.alerts.error')

                        <div class="card p-4 text-muted mb-4">

                            <!-- 削除、編集ボタン（削除、編集機能の時にいじる） -->
                            @if($canEditOrDelete)
                                <div class="text-end p-1 d-flex justify-content-end gap-2">
                                    <!-- 削除ボタン -->
                                    <form method="POST" action="{{ route('article.destroy', ['article' => $article->id]) }}" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger rounded-pill px-3">削除する</button>
                                    </form>
                                    <!-- 編集ボタン -->
                                    <a href="{{ route('articles.edit', $article) }}" class="btn btn-success rounded-pill px-3">編集する</a>
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

                        <!-- コメント -->
                        <div class="card text-muted mb-4">
                            <strong class="p-3">コメント</strong>
                            <hr class="my-0">
                            <!-- 投稿者と投稿日 -->
                            @forelse($article->comments as $comment)
                                <small class="mx-3 mt-3 mb-1 d-block">
                                    {{ $comment->member->name }}が{{ $comment->created_at->format('Y年m月d日') }}に投稿
                                </small>
                                <!-- コメント内容 -->
                                <div>
                                    <p class="mb-2 mx-3">{{ $comment->contents }}</p>
                                    @if(!$loop->last)
                                        <hr class="mb-2 mx-3">
                                    @endif
                                </div>
                            @empty
                                <p class="p-3">コメントはありません</p>
                            @endforelse
                            <!-- コメント投稿 -->
                            @auth
                                <hr class="my-3">
                                {!! Form::open(['route' => 'articles.comment.store', 'method' => 'post']) !!}
                                <!-- 隠しフォームで記事idを送信 -->
                                {!! Form::hidden('article_id', $article->id) !!}
                                <div class="container">
                                    <div class="d-flex align-items-end flex-column flex-sm-row mb-3 mx-2">
                                        <div class="flex-grow-1 me-sm-3">
                                            {!! Form::textarea('contents', old('contents'), [
                                                'class' => 'form-control border-success rounded',
                                                'rows' => 6,
                                                'id' => 'contents',
                                                'placeholder' => 'コメントを入力',
                                            ]) !!}
                                            @error('contents')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <!-- コメント投稿ボタン -->
                                        <div>
                                            {!! Form::submit('コメント', ['class' => 'btn border-success text-success rounded-pill mt-3 px-3']) !!}
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
