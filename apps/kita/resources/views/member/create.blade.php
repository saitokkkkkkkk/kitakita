@extends('member.form')

@section('content')
    @php
        $formRoute = 'articles.store';
        $formMethod = 'POST';
        $submitButtonText = '投稿する';
    @endphp
    @parent
@endsection
