<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

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
//Route::view('/edit/{id}','layouts.edit');



Route::view('/',"layouts.templates");

Route::get('/edit/{id}',[TodoController::class,"edit"]);
Route::post('/edit/{id}',[TodoController::class,"update"]);
Route::post('/store',[TodoController::class,"store"]);
Route::get('task/{id}',[TodoController::class,"important"]);
Route::get('gettask',[TodoController::class,"index"]);
Route::get('sendmail',[TodoController::class,'index']);
Route::get('search',[TodoController::class,"getsearchdata"]);
