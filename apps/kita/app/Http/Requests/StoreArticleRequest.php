<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

//記事更新でも多分使う
class StoreArticleRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'tags' => 'required|array',
            'tags.*' => 'exists:article_tags,id', //存在するタグのみを追加可能
            'contents' => 'required|string|max:3000',
        ];
    }
}
