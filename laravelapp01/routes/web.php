<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\TestController;
use App\Http\Controllers\ContactformController;
use App\Http\Controllers\ContactformShowController;
use App\Http\Controllers\ContactformDoneController;
use App\Http\Controllers\GenderController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test', [TestController::class, 'index']);
Route::get('/honoka', [TestController::class, 'demo']);

Route::get('/contactform', [ContactformController::class, 'index']);
Route::post('/contactform', [ContactformController::class, 'post']);

Route::post('/contactform/done', [ContactformDoneController::class, 'done']);


//@param method : DBデータの取得方法
// dbclass => DBクラス
// querybuilder => クエリビルダ
// その他 => Eloquent ORM

Route::get('/show/{method?}', [ContactformShowController::class, 'index']);
Route::get('/gender', [GenderController::class, 'index']);

