<?php

return [
    'custom' => [

        //会員登録のバリデーションエラーメッセージ
        'name' => [
            'required' => ':attributeは必須です。',
            'string' => ':attributeは文字列でなければなりません。',
            'max' => ':attributeは:max文字以下でなければなりません。',
        ],
        'email' => [
            'required' => ':attributeは必須です。',
            'email' => ':attributeの形式が無効です。',
            'unique' => 'この:attributeは既に使用されています。',
        ],
        'password' => [
            'required' => ':attributeは必須です。',
            'string' => ':attributeは文字列でなければなりません。',
            'min' => ':attributeは:min文字以上にしてください。',
            'confirmed' => ':attribute確認が一致しません。',
        ],

        // 記事保存のバリデーションエラーメッセージ
        'title' => [
            'required' => ':attributeは必須です。',
            'string' => ':attributeは文字列でなければなりません。',
            'max' => ':attributeは:max文字以下でなければなりません。',
        ],
        'tags' => [
            'required' => ':attributeは必須です。',
            'array' => ':attributeは配列でなければなりません。',
            'exists' => '選択された:attributeが無効です。',
        ],
        'contents' => [
            'required' => ':attributeは必須です。',
            'string' => ':attributeは文字列でなければなりません。',
            'max' => ':attributeは:max字以下でなければなりません',
        ],

        // パスワード変更のバリデーションエラーメッセージ
        'newPassword' => [
            'required' => ':attributeは必須です。',
            'min' => ':attributeは:min文字以上にしてください。',
            'confirmed' => ':attribute確認が一致しません。',
        ],
    ],

    'attributes' => [
        'name' => 'ユーザー名',
        'email' => 'メールアドレス',
        'password' => 'パスワード',
        'title' => 'タイトル',
        'tags' => 'タグ',
        'contents' => '記事内容',
        'newPassword' => '新しいパスワード',
    ],

];
