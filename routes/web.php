<?php
// use Carbon\Carbon;
use Illuminate\Support\Carbon;
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
    // return 'asd';
    // return Carbon::call()->parse('2019-05-05 00:00:00')->unix();
    // return time('2019-05-05 00:00:00');
    $now = new Carbon('2019-05-05 00:00:00');
    // return $now;
    return $now->timestamp;
    
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
        Route::get('/index','Surveies\RequestListController@index');
        Route::get('/question-bank','Surveies\QuestionBankController@questionBank');
        Route::post('/create','Surveies\SurveyController@create');
        Route::post('/image-data','Surveies\SurveyController@uploadImage');
        Route::post('/image-delete','Surveies\SurveyController@deleteImage');
        Route::post('/abort','Surveies\SurveyController@abort');
    });
    
     //survey-response
     Route::group(['prefix' => 'response'], function () {
        Route::post('/index','Surveies\ResponseListController@getForm');
        Route::post('/questions','Surveies\ResponseListController@selectQuestionItem');
        Route::post('/create','Surveies\ResponseController@response');
    });
    
     //survey-analysis
     Route::group(['prefix' => 'analysis'], function () {
      Route::post('/index','Surveies\AnalysisController@analysis');
      Route::post('/target-result','Surveies\AnalysisController@targetAnalysis');
    });  

    //market
    Route::group(['prefix' => 'market'], function () {
        Route::get('/index','Markets\ListController@index');
        Route::post('/show','Markets\ListController@show');
        Route::post('/sale','Markets\MarketController@salesRegistration');
        Route::post('/purchase','Markets\MarketController@purchase');        
        Route::post('/sellable-forms','Markets\ListController@sellableForms');
        Route::post('/sellable-show','Markets\ListController@sellableShow'); 
    });

    //donation
    Route::group(['prefix' => 'donation'], function () {
        Route::get('/index','Donations\ListController@index');
        Route::post('/create','Donations\DonationController@create')->middleware('donator');
        Route::post('/donate','Donations\DonationController@donate');
        Route::post('/show','Donations\ListController@show');
    });
    
});
