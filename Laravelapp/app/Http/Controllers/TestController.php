<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response; 

class TestController extends Controller
{
    public function index(Request $request, string $name = 'testname') {

        $data =  [
            'name' => $name, 
            'menu' => ['Home', 'Company', 'Business', 'Contact'],
            'customerList' => [
                ['name' => '山田たろう', 'mail' => 'yamada@gmail.com'],
                ['name' => '鈴木花子', 'mail' => 'suzuki@gmail.com'],
                ['name' => '斎藤洋子', 'mail' => 'saito@gmail.com'],
                ['name' => '山中信二', 'mail' => 'ymanaka@gmail.com'],
            ],
            'message' => 'Hello!',
            'data' => $request->data,
        ];

        return view('test.test', $data);
     
    }

    public function form() {

        $data = [
            'msg' => '',
            'items' => ['おもちゃA', 'おもちゃB', 'おもちゃC', 'おもちゃD'],
        ];

        $view = view('test.form', $data);
        return $view;
    }

    public function post(Request $request) {
        $name = $request->name;
        $msg = $name ? $name.'の入力完了' : '';
        $data = [
            'msg' => $msg,
        ] ;
        $view = view('test.form', $data);
        return $view;
    }

}
