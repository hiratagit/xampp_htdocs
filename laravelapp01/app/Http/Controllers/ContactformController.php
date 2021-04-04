<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactformRequest;

class ContactformController extends Controller
{
    public function index() {

        $msg = 'お気軽にお問い合わせください。';
        
        return view('contactform.index', [ 'msg' => $msg ]);
    }

    public function post(ContactformRequest $request) {

        $msg = '下記の内容でよろしいですか？';
        $input_data = [
            'name' => $request->name,
            'tel' => $request->tel,
            'email' => $request->email,
            'gender_id' => $request->gender_id,
            'kind' => $request->kind,
            'text' => $request->text,
        ];

        return view('contactform.confirm', [ 'msg' => $msg, 'input_data' => $input_data ]);
    }
}
