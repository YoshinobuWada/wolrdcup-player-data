<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditFormRequest extends FormRequest
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
            'uniform_num'=>['required', 'numeric'],
            'name'=>['required'],
            'club'=>['required'],
            'birth'=>['required','date'],
            'height'=>['required','numeric'],
            'weight'=>['required','numeric']
        ];
    }

    public function messages(){
    return  [
        'uniform_num.required' => 'この項目は必須入力です。',
        'uniform_num.numeric' => 'この項目は半角数字で入力してください。',
        'name.required' => 'この項目は必須入力です。',
        'club.required' => 'この項目は必須入力です。',
        'birth.required' => 'この項目は必須入力です。',
        'birth.date' => 'この項目は「YYYY-MM-DD」で入力してください。',
        'height.required' => 'この項目は必須入力です。',
        'height.numeric' => 'この項目は半角数字で入力してください。',
        'weight.required' => 'この項目は必須入力です。',
        'weight.numeric' => 'この項目は半角数字で入力してください。'
    ];
}
}
