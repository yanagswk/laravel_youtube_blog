<?php
/**
 * DBに登録する際のバリデーションチェックをするモジュール
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
     * 登録カラムの条件を指定できる
     *
     * @return array
     */
    public function rules()
    {
        return [
            // requiredで必須
            'title' => 'required | max:100',
            'content' => 'required'
        ];
    }
}
