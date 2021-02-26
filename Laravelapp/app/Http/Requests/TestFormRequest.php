<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class TestFormRequest extends FormRequest
{

    public function authorize()
    {
        if($this->path() === 'form') {
            return true;
        } else {
            return false;
        }
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'mail' => 'required|email',
            'age' => 'required|numeric|between:0,150',
        ];
    }
    
    public function messages() {

        return [
            'name.required' => '名前必須だよ',
            'mail.email' => 'メールちゃんと入れろ',
            'age.required' => '年齢必須やで',
            'age.numeric' => '数字ちゃうで',
            'age.between' => '間が違うで',
        ];

    }
}