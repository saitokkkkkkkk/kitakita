import './bootstrap';

// アラートメッセージを5秒で非表示にする
// DOMContentがLoadされたらaddEventListener()である第二引数の無名関数が動く
document.addEventListener('DOMContentLoaded', function() {
    //htmlのid属性のとこから要素取得
    const successAlert = document.getElementById('success-alert');
    if (successAlert) {
        setTimeout(() => {
            successAlert.style.display = 'none'; // 完全に非表示にする
        }, 5000); // 5秒後に上が実行される
    }
});
