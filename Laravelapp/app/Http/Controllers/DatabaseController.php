<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatabaseController extends Controller
{
    public function index(Request $request) {
    
        if(isset($request->id)) {
        
            $param = [ 'id' => $request->id ];
            $items = DB::select('select * from people where id = :id', $param);

        } else {
            $items = DB::select('select * from people');
        }


        return View('test.database', ['items' => $items]);
    }

    public function add(Request $request) {

        return View('test.databaseadd');
    }
}
