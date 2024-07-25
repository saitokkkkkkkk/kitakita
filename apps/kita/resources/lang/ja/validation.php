<?php

return [
    'custom' => [
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
    ],

    'attributes' => [
        'name' => 'ユーザー名',
        'email' => 'メールアドレス',
        'password' => 'パスワード',
    ],
];
