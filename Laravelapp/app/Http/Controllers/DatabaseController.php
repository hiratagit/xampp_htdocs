<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatabaseController extends Controller
{
    public function index(Request $request) {
    
        if(isset($request->id)) {
        
            // $param = [ 'id' => $request->id ];
            // $items = DB::select('select * from people where id = :id', $param);
            $id = $request->id;
            //$items = DB::table('people')->where('id', $id)->first();

            $items = DB::table('people')->where('id', '<=', $id)->get();

        } elseif (isset($request->name)){
            $name = $request->name;
            $items = DB::table('people')
                ->where('name', 'like', '%'.$name.'%')
                ->orWhere('mail', 'like', '%'.$name.'%')
                ->get();
        } else {
            // $items = DB::select('select * from people');
            //$items = DB::table('people')->get(['id', 'name', 'mail', 'age']);
            $items = DB::table('people')->orderBy('id', 'desc')->get();
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

        //DB::insert('insert into people (name, mail, age) values(:name, :mail, :age)', $param );
        DB::table('people')->insert($param);

        return redirect()->to('/database');
    }

    public function edit(Request $request) {

        if(!isset($request->id)) { return redirect()->to('/database'); }

        $param = [ 'id' => $request->id];
        // $item = DB::select('select * from people where id = :id', $param);

        $item = DB::table('people')->where('id', $request->id)->first();

        if($item === null) { return redirect()->to('/database'); }

        //return View('test.databaseedit', ['form' => $item[0]]);
        return View('test.databaseedit', ['form' => $item]);
    }

    public function update(Request $request) {

        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];

        // DB::update('update people set name = :name, mail = :mail, age = :age where id = :id', $param);
        DB::table('people')->where('id', $request->id)->update($param);

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
        //DB::delete('delete from people where id = :id', $param);

        DB::table('people')->where('id', $request->id)->delete();

        return redirect()->to('/database');
    }
}
