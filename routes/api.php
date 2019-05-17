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

   //user
   Route::group(['prefix' => 'user'], function () {
        
        Route::post('/register', 'Users\RegisterController@register');
        Route::post('/login', 'Users\LoginController@login');
        Route::post('/check', 'Users\UserController@check')->middleware('checkToken');
        Route::post('/surveys', 'Users\UserController@userSurveys');
        Route::post('/survey', 'Users\UserController@userSurvey');
        Route::post('/wallet', 'Users\UserController@getWallet');
        Route::post('/wallet/receipt/{range}/{method?}', 'Users\UserController@getReceipt');
        Route::post('/issale', 'Users\UserController@isSale');
    
    });

    //survey-request
    Route::group(['prefix' => 'survey'], function () {
        
        Route::get('/index', 'Surveys\RequestListController@index');
        Route::get('/question-bank', 'Surveys\QuestionBankController@questionBank');
        Route::post('/create', 'Surveys\RequestController@create');
        Route::post('/image-data', 'Surveys\RequestController@uploadImage');
        Route::post('/image-delete', 'Surveys\RequestController@deleteImage');
        Route::post('/abort', 'Surveys\SurveyController@abort');
    
    });

    //survey-response
    Route::group(['prefix' => 'response'], function () {
    
        Route::post('/index', 'Surveys\ResponseListController@getForm');
        Route::post('/questions', 'Surveys\ResponseListController@selectQuestionItem');
        Route::post('/create', 'Surveys\ResponseController@response');
    
    });

    //survey-analysis
    Route::group(['prefix' => 'analysis'], function () {
       
        Route::post('/index', 'Surveys\AnalysisController@analysis');
        Route::post('/target-result', 'Surveys\AnalysisController@targetAnalysis');
    
    });  

    //survey-market
    Route::group(['prefix' => 'market'], function () {
    
        Route::post('/index', 'Markets\ListController@index');
        Route::post('/show', 'Markets\ListController@show');
        Route::post('/sale', 'Markets\MarketController@salesRegistration');
        Route::post('/purchase', 'Markets\MarketController@purchase');        
        Route::post('/sellable-forms', 'Markets\ListController@sellableForms');
        Route::post('/sellable-show', 'Markets\ListController@sellableShow'); 
    
    });

    //donation
    Route::group(['prefix' => 'donation'], function () {

        Route::get('/index', 'Donations\ListController@index');
        Route::post('/create', 'Donations\DonationController@create')/*->middleware('donator')*/;
        Route::post('/donate', 'Donations\DonationController@donate');
        Route::post('/show', 'Donations\ListController@show');
    
    });
