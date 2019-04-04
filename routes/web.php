<?php
use Carbon\Carbon;
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
    $now = new Carbon;
    dd($now);
});

//user
Route::post('/register','Users\RegisterController@register');
Route::post('/login','Users\LoginController@login');


Route::get('',function(){
    return response('test')
        ->header('Content-Type','application/json')
        ->header('Authorization','bearer cR0ExVVlERoMYtEcozWnVFdmPpwcg7ppxi8iPGDS63RgBYlJKOqM7FwW8cHNVw4XxygLVsuZLyrKeKk.EmxNofV7MZkDe6jZ56LtfDaBLKxAUmgPHp0if83NDJd.gWQq');
});


