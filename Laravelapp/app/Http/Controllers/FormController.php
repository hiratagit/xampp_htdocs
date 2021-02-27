<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests\TestFormRequest;
use Validator;

class FormController extends Controller
{
    public function index(Request $request) {

        $validator = Validator::make($request->query(), [
            'id' => 'required',
            'pass' => 'required',
        ]);

        if($validator->fails()) {
            $msg = 'クエリーに問題あり';
        } else {
            $msg = 'ID/PASSを受け付けました。フォームを入力ください';
        }

        return view('form.form', ['msg' => $msg, ]);
    }

    public function post(Request $request) {

        $rules = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'required|numeric',
        ];

        $messages = [
            'name.required' => '名前必須だよ',
            'mail.email' => 'メールちゃんと入れろ',
            'age.required' => '年齢必須やで',
            'age.numeric' => '数字ちゃうで',
            'age.min' => '値が小さすぎます',
            'age.max' => '値が大きすぎます',
        ];


        $validator = Validator::make($request->all(), $rules, $messages);

        $validator->sometimes('age', 'min:0', function($input) {
            return is_numeric($input->age);
        });

        $validator->sometimes('age', 'max:150', function($input) {
            return is_numeric($input->age);
        });

        if($validator->fails()) {
            return redirect('/form-fail')
                ->withErrors($validator)
                ->withInput();
        }
        
        return view('form.form', ['msg' => '正しく入力されました',]);
    }

    public function formFail() {
        return view('form.form-fail', ['msg' => '正しく入力されませんでした',]);
    }
}
