<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gender;

class GenderController extends Controller
{
    public function index() {

        $items = Gender::all();
        return view('contactform.gender', ['items' => $items ]);
    }
}
