<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'email'=>['required', 'email','unique:users,email'],
            'password'=>['required','min:8','confirmed:password'],
            'password_confirmation'=>['required'],
            'role' => ['required']
        ];
    }

    public function messages(){
        return  [
            'email.required' => 'この項目は必須入力です。',
            'email.email' => 'emailの形式で入力してください。',
            'email.unique' => '入力されたメールアドレスはすでに登録されています。',
            'password.required' => 'この項目は必須入力です。',
            'password.min' => 'パスワードは8文字以上で入力してください。',
            'password.confirmed' => 'パスワードが確認用と一致していません。',
            'password_confirmation.required' => 'この項目は必須入力です。',
            'role.required' => 'この項目は必須入力です。'
        ];
    }
}
