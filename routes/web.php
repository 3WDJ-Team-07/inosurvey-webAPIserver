<?php
use Carbon\Carbon;
use App\Models\Surveies\Type;
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


//Test
Route::get('/', function () {
    $now = new Carbon;
    return now();
    // return date('Y-m-d H:00');
    // return date('Y-m-d H:00',strtotime(now()));
});

Route::get('/test','Helpers\TestController@test');
Route::get('/boards','Helpers\TestController@arrayTest2');
Route::post('/boards','Helpers\TestController@arrayTest');

Route::get('file',function(){
    return view('test');
});
//////////////////////////////////////////////////////////////////




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
    
    //donation
    Route::group(['prefix' => 'donation'], function () {
        Route::get('/index','Donations\DonationController@index');
        Route::post('/create','Donations\DonationController@create')->middleware('donator');
         
    });
    
});
