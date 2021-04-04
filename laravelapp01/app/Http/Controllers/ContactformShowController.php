<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Contactform;

class ContactformShowController extends Controller
{
    public function index(Request $request, $method = 'eloquent') {

        $sort = $request->sort;

        if($sort === null) {
            $sort = 'id';
        }

        if($method === "dbclass") {
            $data =  $this->getByDBclass();
        } elseif ($method === "querybuilder") {
            $data =  $this->getByBuilder($sort);
        } else {
            $data = $this->getByEloquent($sort);
        }

        return view('contactform.show', [ 'items' => $data[0], 'method' => $data[1], 'sort' => $sort ]);
    }

    protected function getByDBclass() {
        $items = DB::select(('select * from contactforms order by id desc limit 10'));
        $method = "DBクラス(SQL Query)";
        $data = [ $items, $method ];
        return $data;
    }

    protected function getByBuilder($sort) {
        // $items = DB::table('contactforms')->orderBy('id', 'desc')->limit(10)->get();
        $items = DB::table('contactforms')->orderBy($sort, 'desc')->paginate(5);
        $method = 'DBクラス(Query Builder)';
        $data = [ $items, $method ];
        return $data;
    }

    protected function getByEloquent($sort) {
        $items = Contactform::orderBy($sort, 'desc')->paginate(5);
        $method = 'Eloquent ORM';
        $data = [ $items, $method ];
        return $data;
    }
}
