<?php

namespace App\Http\Requests;

use App\Rules\Current;
use Illuminate\Foundation\Http\FormRequest;

class LoginFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email'=>['required', 'email','exists:users,email'],
            'password'=>['required']
        ];
    }

    public function messages(){
        return  [
            'email.required' => 'この項目は必須入力です。',
            'email.email' => 'emailの形式で入力してください。',
            'email.exists' => 'このメールアドレスは登録されていません。',
            'password.required' => 'この項目は必須入力です。',
        ];
    }
}
