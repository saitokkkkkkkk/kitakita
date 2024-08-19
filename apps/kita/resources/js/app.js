import './bootstrap';

// DOMの読み込みが完了した後に実行
document.addEventListener('DOMContentLoaded', function () {
    // アラートメッセージを5秒で非表示にする
    var successAlert = document.getElementById('success-alert');
    if (successAlert) {
        setTimeout(function () {
            successAlert.style.display = 'none'; // 非表示にする
        }, 5000); // 5秒後に実行
    }

    // 論理削除前のconfirm box
    const deleteForms = document.querySelectorAll('form.delete-form');
    deleteForms.forEach(function (form) {
        form.addEventListener('submit', function (event) {
            const confirmed = confirm('一度削除すると元に戻せません。よろしいですか？');
            if (!confirmed) {
                event.preventDefault(); // ユーザが「いいえ」を押したらフォーム送信中止
            }
        });
    });
});
