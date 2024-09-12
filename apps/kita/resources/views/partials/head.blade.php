<!doctype html>
{{-- これはどのビューでも必要なコード --}}
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kitaアプリ</title>

    <!--css-->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- js -->
    <script src="{{ mix('js/app.js') }}"></script>

</head>
