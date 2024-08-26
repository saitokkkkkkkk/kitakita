@extends('layouts.admin')

@section('content')
    {{-- タグ編集機能作成時にいじる --}}
    @include('vendor.alerts.success')
    @include('vendor.alerts.error')
　　タグ id ： {{ $articleTag->id }} の編集画面
@endsection
