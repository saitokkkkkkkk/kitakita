import './bootstrap';

// アラートメッセージを5秒で非表示にする
document.addEventListener('DOMContentLoaded', function() {
    const successAlert = document.getElementById('success-alert');
    if (successAlert) {
        setTimeout(() => {
            successAlert.classList.add('out'); // アラートにoutクラスを追加
            setTimeout(() => {
                successAlert.style.display = 'none'; // 完全に非表示にする
            }, 15); // トランジションの時間に合わせる
        }, 5000); // 5秒後に実行
    }
});

//保存後の画面で入力内容を保持
document.addEventListener('DOMContentLoaded', function() {
    //タイトル、内容、タグを取得
    const articleData = document.getElementById('article-data');
    if (articleData) {
        //各々を変数に入れる
        const title = articleData.getAttribute('data-title');
        const contents = articleData.getAttribute('data-contents');
        const tags = JSON.parse(articleData.getAttribute('data-tags'));

        //タイトルと内容をポピュレート（＝入力フィールドに入力）
        document.querySelector('input[name="title"]').value = title;
        document.querySelector('textarea[name="contents"]').value = contents;

        //選択されたタグを取得して表示
        const select = document.querySelector('select[name="tags[]"]');
        if (select) {
            Array.from(select.options).forEach(option => {
                option.selected = tags.includes(parseInt(option.value));
            });
        }
    }
});
