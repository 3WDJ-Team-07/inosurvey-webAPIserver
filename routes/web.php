<?php
use Carbon\Carbon;
use App\Models\Surveies\Type;
use App\Models\Donations\Donation;
/*
|--------------------------------------------------------------------------
| REST API 설계 규칙
|--------------------------------------------------------------------------
|1.URI는 정보의 자원을 표현해야한다.
|2.자원에 대한 행위는 HTTP Metohd(GET,POST,PUT,DELETE)로 표현한다.
|3.슬래시 구분자(/)는 계층 관계를 나타내는데 사용한다.
|4.Method 작명은 HTTP와 처리 할 액션으로 구성한다. 
|
|
*/

//Test

Route::get('/', function () {
    $now = new Carbon;
    return now();
    // return date('Y-m-d H:00');
    // return date('Y-m-d H:00',strtotime(now()));
});


Route::post('/imageData','Helpers\TestController@test');
Route::get('/boards','Helpers\TestController@arrayTest2');
Route::get('/boards','Helpers\TestController@arrayTest');

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
        Route::post('/image-data','Surveies\SurveyController@imageUpload');
        Route::get('/question-bank','Surveies\QuestionBankController@questionBank'); 
    });
    
    //donation
    Route::group(['prefix' => 'donation'], function () {
        Route::get('/index','Donations\DonationController@index');
        Route::post('/create','Donations\DonationController@create')/*->middleware('donator')*/;
         
    });
    
});
