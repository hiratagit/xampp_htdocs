<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\MyTestRule;

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
            'age' => ['required', new MyTestRule(5)],
        ];
    }
    
    public function messages() {

        return [
            'name.required' => '名前必須だよ',
            'mail.email' => 'メールちゃんと入れろ',
            'age.required' => '年齢必須やで',
            'age.numeric' => '数字ちゃうで',
            'age.between' => '間が違うで',
            'age.test' => 'Test:5の倍数のみ受け付けます！',
        ];

    }
}