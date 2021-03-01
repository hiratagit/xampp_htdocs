<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CookieController extends Controller
{
    public function index(Request $request) {

        if($request->hasCookie('msg')) {
            $msg = 'Cookie: '. $request->cookie('msg');
        } else {
            $msg = 'クッキーはありません。';
        }
        return view('form.cookie', ['msg' => $msg]);
    }

    public function post(Request $request) {
        $rule = [
            'msg' => 'required',
        ];

        $this->validate($request, $rule);
        $msg = $request->msg;
        $response = response()->view('form.cookie', ['msg' => "「{$msg}」をクッキーに保存しました。"]);
        $response->cookie('msg', $msg, 100);
        return $response;
    }
}
