import './bootstrap';

// アラートメッセージを5秒で非表示にする
document.addEventListener('DOMContentLoaded', function () {
    var successAlert = document.getElementById('success-alert');
    if (successAlert) {
        setTimeout(function () {
            successAlert.style.display ='none'; // 非表示にする
        }, 5000); // 5秒後に実行
    }
});

//論理削除前のconfirm box
document.addEventListener('DOMContentLoaded', function() {
    //クラスdelete-formを持つ全てのフォームを取得
    const deleteForms = document.querySelectorAll('form.delete-form');
    //各フォームにイベントリスナーを追加
    deleteForms.forEach(function (form) {
        form.addEventListener('submit', function (event) {
            //確認ダイアログ表示
            const confirmed = confirm('一度削除すると元に戻せません。よろしいですか？');
            //ユーザが「いいえ」を押したらフォーム送信中止
            if (!confirmed) {
                event.preventDefault();
            }
        });
    });
})
