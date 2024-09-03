@extends('layouts.admin')

@section('content')
    {{-- 管理者編集機能作成時にいじる --}}
    @include('vendor.alerts.success')
    @include('vendor.alerts.error')
    管理者 id ： {{ $adminUser->id }} の編集画面
@endsection
