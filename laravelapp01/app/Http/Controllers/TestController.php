<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index (Request $request) {

        return view('layouts.new-master');
    }

    public function demo(Request $request) {

        return view('layouts.honoka-bootstrap');
    }
}
