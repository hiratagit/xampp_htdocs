<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests\TestFormRequest;
use App\Http\Requests\TestFormRequest;
use Validator;

class FormController extends Controller
{
    public function index(Request $request) {


        $msg = 'フォームを入力ください';
        return view('form.form', ['msg' => $msg, ]);
    }

    public function post(TestFormRequest $request) {

        // $rules = [
        //     'name' => 'required',
        //     'mail' => 'email',
        //     'age' => 'required|numeric',
        //     'radio' => 'required',
        //     'intext' => 'required',
        // ];

        // $messages = [
        //     'name.required' => '名前必須だよ',
        //     'mail.email' => 'メールちゃんと入れろ',
        //     'age.required' => '年齢必須やで',
        //     'age.numeric' => '数字ちゃうで',
        //     'age.min' => '値が小さすぎます',
        //     'age.max' => '値が大きすぎます',
        //     'radio.required' => 'ラジオボタンを選択してください',
        //     'intext.required' => '記入必須項目です',
        //     'intext.numeric' => '年齢は数値を入力してください',
        //     'intext.email' => 'メールの形式を正しく入力してください',
        // ];


        // $validator = Validator::make($request->all(), $rules, $messages);

        // $validator->sometimes('age', 'min:0', function($input) {
        //     return is_numeric($input->age);
        // });

        // $validator->sometimes('age', 'max:150', function($input) {
        //     return is_numeric($input->age);
        // });

        // $validator->sometimes('intext', 'numeric', function($input) {
        //     return $input->radio === 'age';
        // });

        // $validator->sometimes('intext', 'email', function($input) {
        //     return $input->radio === 'mail';
        // });

        // if($validator->fails()) {
        //     return redirect('/form')
        //         ->withErrors($validator)
        //         ->withInput();
        // }
        
        return view('form.form', ['msg' => '正しく入力されました',]);
    }

    public function formFail() {
        return view('form.form-fail', ['msg' => '正しく入力されませんでした',]);
    }
}
