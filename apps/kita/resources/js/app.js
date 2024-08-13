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
