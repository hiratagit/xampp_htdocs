<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Contactform;

class ContactformShowController extends Controller
{
    public function index(Request $request, $method = 'dbclass') {

        if($method === "dbclass") {
            $data =  $this->getByDBclass();
        } elseif ($method === "querybuilder") {
            $data =  $this->getByBuilder();
        } else {
            $data = $this->getByEloquent();
        }

        return view('contactform.show', [ 'items' => $data[0], 'method' => $data[1] ]);
    }

    protected function getByDBclass() {
        $items = DB::select(('select * from contactforms order by id desc limit 10'));
        $method = "DBクラス(SQL Query)";
        $data = [ $items, $method ];
        return $data;
    }

    protected function getByBuilder() {
        $items = DB::table('contactforms')->orderBy('id', 'desc')->limit(10)->get();
        $method = 'DBクラス(Query Builder)';
        $data = [ $items, $method ];
        return $data;
    }

    protected function getByEloquent() {
        $items = Contactform::orderBy('id', 'desc')->limit(20)->get();
        $method = 'Eloquent ORM';
        $data = [ $items, $method ];
        return $data;
    }
}
