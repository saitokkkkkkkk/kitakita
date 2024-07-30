@extends('member.form')

@section('content')
    @php
        // 保存後なので全部不要
        $formRoute = '';
        $formMethod = '';
        $submitButtonText = '一覧表示に戻る';
    @endphp
    @parent

    <!-- フォーム入力内容を表示 -->
    @if($article)
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelector('input[name="title"]').value = @json($article->title);
                document.querySelector('textarea[name="contents"]').value = @json($article->contents);

                // タグが複数選択されるようにする
                const tags = @json($article->tags->pluck('id'));
                const select = document.querySelector('select[name="tags[]"]');
                if (select) {
                    // 選択する値を設定する
                    Array.from(select.options).forEach(option => {
                        option.selected = tags.includes(parseInt(option.value));
                    });
                }
            });
        </script>
    @endif

@endsection
