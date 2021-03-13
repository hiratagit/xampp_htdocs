<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Validator;
use App\Models\Person;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HelloController extends Controller
{

    public function index(Request $request) {

        $user = Auth::user();
        $sort = $request->sort;
        $items = Person::orderBy($sort, 'asc')->paginate(5);
        $param = [ 
            'items' => $items,
             'sort' => $sort, 
             'user' => $user 
        ];
        return view('hello.index', $param);
    }

    public function post(Request $request) {

        $validete_rule = [
            'msg' => 'required',
        ];

        $this->validate($request, $validete_rule);
        $msg = $request->msg;
        $response = response()->view('hello.index', ['msg' => '「'.$msg.
                                        '」をクッキーに保存しました。']);

        $response->cookie('msg', $msg, 100);

        return $response;
    }

    public function rest(Request $request) {
        return view('hello.rest');
    }

    public function ses_get(Request $request) {
        $sesdata = $request->session()->get('msg');
        return view('hello/session', [ 'session_data' => $sesdata ]);
    }

    public function ses_put(Request $request) {
        $msg = $request->input;
        $request->session()->put('msg', $msg);
        return redirect('hello/session');
    }

    public function getAuth(Request $request) {
        $param = ['message' => 'ログインしてください。'];
        return view('hello.auth', $param);
    }

    public function postAuth(Request $request) {
        $email = $request->email;
        $password = $request->password;

        if(Auth::attempt(['email' => $email, 'password' => $password])) {
            $msg = 'ログインしました。('. Auth::user()->name. ')';
        } else {
            $msg = 'ログインに失敗しました。';
        }

        return view('hello.auth', [ 'message' => $msg ]);
    }
 
}
