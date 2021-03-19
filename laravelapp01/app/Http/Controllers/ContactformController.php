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

        $msg = '正しく入力されました。';

        return view('contactform.index', [ 'msg' => $msg ]);
    }
}
