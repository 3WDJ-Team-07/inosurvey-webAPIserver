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
    // $now = new Carbon;
    // return now();
    return date('Y-m-d H:00');
    // return date('Y-m-d H:00',strtotime(now()));
});
Route::get('/test','Helpers\TestController@test');

Route::group(['prefix' => 'api'], function () {
    //user
    Route::group(['prefix' => 'user'], function () {
        Route::post('/register','Users\RegisterController@register');
        Route::post('/login','Users\LoginController@login');
    });

    //survey
    Route::group(['prefix' => 'survey'], function () {
        Route::post('/create','Surveies\SurveyController@create');
        Route::get('/questionBank','Surveies\SurveyController@questionBank'); 
    });
});