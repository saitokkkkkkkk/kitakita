import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;
import '@fontsource/poppins';

// DOMの読み込みが完了した後に実行
document.addEventListener('DOMContentLoaded', function () {
    // 成功メッセージの削除
    var successAlert = document.getElementById('success-alert');
    if (successAlert) {
        setTimeout(function () {
            successAlert.style.display = 'none'; // 非表示にする
        }, 5000); // 5秒後に実行
    }

    // エラーメッセージの削除
    var errorAlert = document.getElementById('error-alert');
    if (errorAlert) {
        setTimeout(function () {
            errorAlert.style.display = 'none'; // 非表示にする
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

    // パラメータにmodal=trueがあればモーダルを自動で表示
    if (window.location.search.includes('modal=true')) {
        var passwordModal = new bootstrap.Modal(document.getElementById('passwordModal'));
        passwordModal.show();
    }

    // ajaxで一括削除
    const bulkDeleteForm = document.getElementById('bulk-delete-form');
    if (bulkDeleteForm) {
        bulkDeleteForm.addEventListener('submit', function (event) {
            event.preventDefault(); // デフォルトのフォーム送信を無効にする

            // 確認ダイアログを表示
            const confirmed = confirm('一度削除すると元に戻せません。よろしいですか？');
            if (!confirmed) {
                return; // ユーザーが「いいえ」を押した場合、削除処理を中止
            }

            // チェックボックスにチェックが入っている記事を収集
            const selectedArticles = Array.from(document.querySelectorAll('input[name="articles[]"]:checked'))
                .map(checkbox => checkbox.value);

            // 記事が一つもチェックされてなければ中止
            if (selectedArticles.length === 0) {
                alert('記事が選択されていません');
                return;
            }

            // 一括削除リクエスト送信
            fetch(bulkDeleteForm.action, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ articles: selectedArticles })
            })
                // レスポンスの処理
                .then(response => {
                    console.log('Response Status:', response.status);
                    return response.json();
                })
                .then(data => {
                    console.log('Response Data:', data); // デバッグ用にレスポンスデータをログに出力
                    if (data.success) {
                        // 削除成功時、DOMからチェックされた記事を削除
                        selectedArticles.forEach(id => {
                            // `data-id` を持つ記事要素を削除
                            const articleElement = document.querySelector(`.delete-button[data-id="${id}"]`);
                            if (articleElement) {
                                articleElement.closest('a').remove(); // `<a>` タグごと削除
                            }
                        });
                    } else {
                        alert('削除に失敗しました');
                    }
                })
                .catch(error => {
                    console.error('エラー発生:', error);
                    alert('削除に失敗しました');
                });
        });
    }

    // ajaxで単体削除
    const deleteButtons = document.querySelectorAll('.delete-button');
    deleteButtons.forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault(); // デフォルト動作を無効にする
            const articleId = this.dataset.id;

            // 確認ダイアログを表示
            const confirmed = confirm('一度削除すると元に戻せません。よろしいですか？');
            if (confirmed) {
                // 削除リクエスト送信
                fetch(`/articles/${articleId}`, {
                    method: 'DELETE',
                    headers: {
                        // HTMLの<meta>タグからCSRFトークンの値を取得してサーバで利用（安全性up）
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        // リクエストのボディがjsonであることをサーバに知らせる
                        'Content-Type': 'application/json',
                        // レスポンスとしてjson形式のデータを期待することをサーバに知らせる
                        'Accept': 'application/json'
                    }
                })
                    // ここからレスポンス処理（ブラウザではなくてjsでレスポンスを処理するのがajaxである）
                    .then(response => {
                        console.log('Response Status:', response.status); // レスポンスのステータスコードをログに出力
                        return response.json(); // JSONとしてレスポンスをパース
                    })
                    .then(data => {
                        if (data.success) {
                            // 削除成功時、対象の記事のaタグの箇所を削除
                            this.closest('a').remove();
                        }
                    })
                    // エラーをログに表示
                    .catch(error => {
                        console.error('エラー発生:', error);
                        alert('削除に失敗しました');
                    });
            }
        });
    });
});
