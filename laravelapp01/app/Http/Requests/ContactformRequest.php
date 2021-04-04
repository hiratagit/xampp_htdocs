<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactformRequest extends FormRequest
{

    public function authorize()
    {
        if($this->path() === 'contactform') {
            return true;
        } else {
            return false;
        }
    }

    public function rules()
    {
        return [
            'name' => 'required|between:0, 50',
            'tel' => 'required|numeric|digits_between:10, 11',
            'email' => 'required|email',
            'gender_id' => 'required|numeric|between:1,2',
            'kind' => 'required',
            'text' => 'required|between:1, 500',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'お名前は必ず入力してください。',
            'name.between' => '50文字以内で入力してください。',
            'tel.required' => 'お電話番号は必ず入力してください。',
            'tel.numeric' => '形式に誤りがあります。数字を入力してください。',
            'tel.digits_between' => '桁数を正しく入力してください。',
            'email.required' => 'emailアドレスを入力してください。',
            'email.email' => 'emailアドレスの形式に誤りがあります。',
            'gender_id.required' => '性別を選択してください。',
            'gender_id.numeric' => '形式に誤りがあります。',
            'gender_id.between' => '形式に誤りがあります。',
            'kind.required' => '選択は必須です。',
            'text.required' => 'お問い合わせ内容を入力してください。',
            'text.between' => '入力文字数制限をオーバーしています。'
        ];
    }
}
