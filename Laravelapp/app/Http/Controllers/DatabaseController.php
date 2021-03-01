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

    public function create(Request $request) {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];

        DB::insert('insert into people (name, mail, age) values(:name, :mail, :age)', $param );

        return redirect()->to('/database');
    }

    public function edit(Request $request) {

        if(!isset($request->id)) { return redirect()->to('/database'); }

        $param = [ 'id' => $request->id];
        $item = DB::select('select * from people where id = :id', $param);

        return View('test.databaseedit', ['form' => $item[0]]);
    }

    public function update(Request $request) {

        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];

        DB::update('update people set name = :name, mail = :mail, age = :age where id = :id', $param);

        return redirect()->to('/database');
    }

    public function delete(Request $request) {

        if(!isset($request->id)) { return redirect()->to('/database'); }

        $param = [ 'id' => $request->id ];
        $item = DB::select('select * from people where id = :id', $param);

        return View('test.databasedelete', ['form' => $item[0]]);
    }

    public function remove(Request $request) {
        $param = [ 'id' => $request->id ];
        DB::delete('delete from people where id = :id', $param);
        return redirect()->to('/database');
    }
}
