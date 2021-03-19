<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\TestController;
use App\Http\Controllers\ContactformController;

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