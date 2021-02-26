<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TestFormRequest;

class FormController extends Controller
{
    public function index(Request $request) {

        $data = [
            'msg' => 'フォームを入力',
        ];

        $view = View('form.form', $data);
        return $view;
    }

    public function post(TestFormRequest $request) {

        return view('form.form', ['msg' => '正しく入力されました',]);

    }
}
