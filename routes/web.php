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
    $now = new Carbon();
    // $now = date('Y-m-d H:i:s');
    return $now;
    // return date('Y-m-d H:i:s');
    // return date('Y-m-d H:00',strtotime(now()));
});


Route::get('/test','Helpers\TestController@test');

//////////////////////////////////////////////////////////////////



Route::group(['prefix' => 'api'], function () {

    //user
    Route::group(['prefix' => 'user'], function () {
        Route::post('/register','Users\RegisterController@register');
        Route::post('/login','Users\LoginController@login');
        Route::post('/check','Users\UserController@check')->middleware('checkToken');
        Route::post('/surveies','Users\UserController@userSurveies');
        Route::post('/wallet','Users\UserController@getWallet');
        Route::post('/issale','Users\UserController@isSale');
    });

    //survey
    Route::group(['prefix' => 'survey'], function () {
        Route::get('/index','Surveies\SurveyController@index');
        Route::get('/question-bank','Surveies\QuestionBankController@questionBank');
        Route::post('/create','Surveies\SurveyController@create');
        Route::post('/image-data','Surveies\SurveyController@uploadImage');
        Route::post('/image-delete','Surveies\SurveyController@deleteImage');
        Route::post('/abort','Surveies\SurveyController@abort');
    });
    
     //survey-response
     Route::group(['prefix' => 'response'], function () {
        Route::post('/index','Surveies\ResponseController@getForm');
        Route::post('/questions','Surveies\ResponseController@selectQuestionItem');
        Route::post('/create','Surveies\ResponseController@response');
    });
    
     //survey-analysis
     Route::group(['prefix' => 'analysis'], function () {
      Route::post('/index','Surveies\AnalysisController@analysis');
    });  

    //market
    Route::group(['prefix' => 'market'], function () {
        Route::get('/index','Markets\MarketController@index');
        Route::post('/show','Markets\MarketController@show');
        Route::post('/create','Markets\MarketController@create');        
        Route::post('/sellable-forms','Markets\MarketController@sellableForms');
        Route::post('/sellable-show','Markets\MarketController@sellableShow'); 
    });

    //donation
    Route::group(['prefix' => 'donation'], function () {
        Route::get('/index','Donations\DonationController@index');
        Route::post('/create','Donations\DonationController@create')/*->middleware('donator')*/;
        Route::post('/show','Donations\DonationController@show'); 
    });
    
});
