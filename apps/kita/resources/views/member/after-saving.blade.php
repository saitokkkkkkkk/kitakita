@extends('member.form')

@section('content')
    @php
        // 保存後なので全部不要
        $formRoute = '';
        $formMethod = '';
        $submitButtonText = '';
    @endphp
    @parent

    <!-- フォーム入力内容を表示 -->
    @if($article)
        <div id="article-data"
             data-title="{{ $article->title }}"
             data-contents="{{ $article->contents }}"
             data-tags="{{ json_encode($article->tags->pluck('id')) }}">
        </div>
    @endif
@endsection
