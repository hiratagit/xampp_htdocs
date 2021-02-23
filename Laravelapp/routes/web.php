<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HelloContoroller;
use App\Http\Controllers\HelloController;
use App\Http\Middleware\HelloMiddleware;
use App\Http\Controllers\TestController;

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
Route::get('test/{name?}', [TestController::class, 'index']);

Route::get('hello', [HelloController::class, 'index']);
Route::post('hello', [HelloController::class, 'post']);
