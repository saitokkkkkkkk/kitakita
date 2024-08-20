<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class UpdateMemberPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'newPassword' => ['required', 'min:8', 'confirmed'],
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     * @return mixed
     * @throws ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        // バリデーションエラー発生前のページ（フォーム画面）のURLを取得
        $previousUrl = url()->previous();

        // modal=trueがurlに既に含まれているかを確認
        if (! str_contains($previousUrl, 'modal=true')) {
            // 含まれていなければmodal=trueを追加
            $url = $previousUrl.(parse_url($previousUrl, PHP_URL_QUERY) ? '&' : '?').'modal=true';
        } else {
            // 既に含まれている場合はそのまま
            $url = $previousUrl;
        }

        // バリデーションエラーを追加してリダイレクト
        $response = redirect()->to($url)
            ->withErrors($validator);

        throw new ValidationException($validator, $response);
    }
}
