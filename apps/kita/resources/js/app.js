import './bootstrap';

// アラートメッセージを5秒で非表示にする
document.addEventListener('DOMContentLoaded', function() {
    const successAlert = document.getElementById('success-alert');
    if (successAlert) {
        setTimeout(() => {
            successAlert.classList.add('out'); // アラートにoutクラスを追加
            setTimeout(() => {
                successAlert.style.display = 'none'; // 完全に非表示にする
            }, 150); // トランジションの時間に合わせる
        }, 5000); // 5秒後に実行
    }
});

