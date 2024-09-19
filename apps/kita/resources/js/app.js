import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;
import '@fontsource/poppins';
import $ from 'jquery';
window.$ = $;

// DOMの読み込みが完了した後に実行
$(document).ready(function() {
    // 成功メッセージの削除
    var $successAlert = $('#success-alert');
    if ($successAlert.length) {
        setTimeout(function() {
            $successAlert.hide(); // 非表示にする
        }, 5000); // 5秒後に実行
    }

    // エラーメッセージの削除
    var $errorAlert = $('#error-alert');
    if ($errorAlert.length) {
        setTimeout(function() {
            $errorAlert.hide(); // 非表示にする
        }, 5000); // 5秒後に実行
    }

    // 論理削除前のconfirm box
    $('form.delete-form').on('submit', function(event) {
        var confirmed = confirm('一度削除すると元に戻せません。よろしいですか？');
        if (!confirmed) {
            event.preventDefault(); // ユーザが「いいえ」を押したらフォーム送信中止
        }
    });

    // パラメータにmodal=trueがあればモーダルを自動で表示
    if (window.location.search.includes('modal=true')) {
        var passwordModal = new bootstrap.Modal($('#passwordModal')[0]);
        passwordModal.show();
    }

    // Ajaxで一括削除
    const bulkDeleteForm = $('#bulk-delete-form');
    if (bulkDeleteForm.length) {
        bulkDeleteForm.on('submit', function(event) {
            event.preventDefault(); // デフォルトのフォーム送信を無効にする

            // confirm boxを表示
            const confirmed = confirm('一度削除すると元に戻せません。よろしいですか？');
            if (!confirmed) {
                return; // ユーザーが「いいえ」を押した場合、削除処理を中止
            }

            // チェックが入っている記事を収集
            const selectedArticles = $('input[name="articles[]"]:checked')
                .map(function() {
                    return $(this).val();
                }).get();

            // 記事が一つもチェックされていない場合も、削除処理を中止
            if (selectedArticles.length === 0) {
                alert('記事が選択されていません');
                return;
            }

            // 一括削除リクエスト送信
            $.ajax({
                url: bulkDeleteForm.attr('action'),
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: 'application/json',
                dataType: 'json',
                data: JSON.stringify({ articles: selectedArticles }),

                // サーバが返す値によって分岐
                success: function(data) {
                    // 削除成功した時
                    if (data.success) {
                        // DOMからチェックされた記事を削除
                        selectedArticles.forEach(function(id) {
                            // data-idを持つ記事要素を画面から削除（だからリロードなしでいける）
                            const articleElement = $(`.article[data-id="${id}"]`);
                            if (articleElement.length) {
                                articleElement.closest('a').remove(); // `<a>` タグごと削除
                            }
                        });
                        // コントローラからreturnされる成功メッセージを表示
                        alert(data.message);
                    // 削除失敗した時
                    } else {
                        // コントローラからreturnされる失敗メッセージを表示
                        alert(data.message);
                    }
                },

                // 未認証時とその他のエラーの処理
                error: function(xhr) {
                    // authミドルウェアが401返してきた時
                    if (xhr.status === 401) {
                        alert('ログインしてください');
                    } else {
                        // その他のエラーの場合
                        alert('削除に失敗しました');
                    }
                }
            });
        });
    }

    // Ajaxで単体削除
    $('.delete-button').on('click', function(event) {
        event.preventDefault(); // デフォルト動作を無効にする

        // 削除対象の記事IDを取得
        const articleId = $(this).data('id');

        // 確認ダイアログを表示
        const confirmed = confirm('一度削除すると元に戻せません。よろしいですか？');
        if (confirmed) {
            // 削除リクエスト送信
            $.ajax({
                url: `/articles/${articleId}`,
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json'
                },

                // コントローラがなんか返却してきた時
                success: function(data) {
                    if (data.success) {
                        // DOMから削除対象の記事を削除
                        const articleElement = $(`a:has(.article[data-id="${articleId}"])`);
                        if (articleElement.length) {
                            articleElement.remove(); // aタグごと削除
                        }
                        // コントローラからreturnされる成功メッセージを表示
                        alert(data.message);
                    } else {
                        // コントローラからreturnされる失敗メッセージを表示
                        alert(data.message);
                    }
                },

                // ミドルウェアとか?がなんか返却してきた時
                error: function(xhr) {
                    // 401
                    if (xhr.status === 401) {
                        alert('ログインしてください');
                    // そのほか
                    } else {
                        alert('削除に失敗しました');
                    }
                }
            });
        }
    });
});
