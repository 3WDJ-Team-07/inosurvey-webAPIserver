<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


   //user
   Route::group(['prefix' => 'user'], function () {
        
        Route::post('/register', 'Users\RegisterController@register');
        Route::post('/login', 'Users\LoginController@login');
        Route::post('/check', 'Users\UserController@check')->middleware('checkToken');
        Route::post('/surveies', 'Users\UserController@userSurveies');
        Route::post('/survey', 'Users\UserController@userSurvey');
        Route::post('/wallet', 'Users\UserController@getWallet');
        Route::post('/wallet/receipt/{range}/{method?}', 'Users\UserController@getReceipt');
        Route::post('/issale', 'Users\UserController@isSale');
    
    });

    //survey-request
    Route::group(['prefix' => 'survey'], function () {
        
        Route::get('/index', 'Surveies\RequestListController@index');
        Route::get('/question-bank', 'Surveies\QuestionBankController@questionBank');
        Route::post('/create', 'Surveies\RequestController@create');
        Route::post('/image-data', 'Surveies\RequestController@uploadImage');
        Route::post('/image-delete', 'Surveies\RequestController@deleteImage');
        Route::post('/abort', 'Surveies\SurveyController@abort');
    
    });

    //survey-response
    Route::group(['prefix' => 'response'], function () {
    
        Route::post('/index', 'Surveies\ResponseListController@getForm');
        Route::post('/questions', 'Surveies\ResponseListController@selectQuestionItem');
        Route::post('/create', 'Surveies\ResponseController@response');
    
    });

    //survey-analysis
    Route::group(['prefix' => 'analysis'], function () {
       
        Route::post('/index', 'Surveies\AnalysisController@analysis');
        Route::post('/target-result', 'Surveies\AnalysisController@targetAnalysis');
    
    });  

    //survey-market
    Route::group(['prefix' => 'market'], function () {
    
        Route::get('/index', 'Markets\ListController@index');
        Route::post('/show', 'Markets\ListController@show');
        Route::post('/sale', 'Markets\MarketController@salesRegistration');
        Route::post('/purchase', 'Markets\MarketController@purchase');        
        Route::post('/sellable-forms', 'Markets\ListController@sellableForms');
        Route::post('/sellable-show', 'Markets\ListController@sellableShow'); 
    
    });

    //donation
    Route::group(['prefix' => 'donation'], function () {

        Route::get('/index', 'Donations\ListController@index');
        Route::post('/create', 'Donations\DonationController@create')->middleware('donator');
        Route::post('/donate', 'Donations\DonationController@donate');
        Route::post('/show', 'Donations\ListController@show');
    
    });
