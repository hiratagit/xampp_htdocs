<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HelloContoroller;
use App\Http\Controllers\HelloController;
use App\Http\Middleware\HelloMiddleware;
use App\Http\Middleware\TestMiddleware;
use App\Http\Middleware\TestResponseMiddleware;
use App\Http\Controllers\TestController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\RestappController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('test/other', [TestController::class, 'other']);
Route::get('test/form', [TestController::class, 'form']);
Route::post('test/form', [TestController::class, 'post']);
//Route::get('test/{name?}', [TestController::class, 'index']);
Route::get('test', [TestController::class, 'index'])
        ->middleware(TestMiddleware::class)->middleware('test');

Route::get('hello', [HelloController::class, 'index'])->middleware('auth');
Route::post('hello', [HelloController::class, 'post']);

Route::get('hello/auth', [HelloController::class, 'getAuth']);
Route::post('hello/auth', [HelloController::class, 'postAuth']);

Route::get('form', [FormController::class, 'index']);
Route::post('form', [FormController::class, 'post']);
Route::get('cookie', [CookieController::class, 'index']);
Route::post('cookie', [CookieController::class, 'post']);
Route::get ('form-fail', [FormController::class, 'formFail']);

Route::get('database', [DatabaseController::class, 'index']);

Route::get('database/add', [DatabaseController::class, 'add']);
Route::post('database/add', [DatabaseController::class, 'create']);

Route::get('database/update', [DatabaseController::class, 'edit']);
Route::post('database/update', [DatabaseController::class, 'update']);

Route::get('database/delete', [DatabaseController::class, 'delete']);
Route::post('database/delete', [DatabaseController::class, 'remove']);

Route::get('person', [PersonController::class, 'index']);

Route::get('person/find', [PersonController::class, 'find']);
Route::post('person/find', [PersonController::class, 'search']);

Route::get('person/add', [PersonController::class, 'add']);
Route::post('person/add', [PersonController::class, 'create']);

Route::get('person/edit', [PersonController::class, 'edit']);
Route::post('person/edit', [PersonController::class, 'update']);
Route::get('person/delete', [PersonController::class, 'delete']);
Route::post('person/delete', [PersonController::class, 'remove']);

Route::get('board', [BoardController::class, 'index']);

Route::get('board/add', [BoardController::class, 'add']);
Route::post('board/add', [BoardController::class, 'create']);

Route::resource('rest', RestappController::class);

Route::get('hello/rest', [HelloController::class, 'rest']);

Route::get('hello/session', [HelloController::class, 'ses_get']);
Route::post('hello/session', [HelloController::class, 'ses_put']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
