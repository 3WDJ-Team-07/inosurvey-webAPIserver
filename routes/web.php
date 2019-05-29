<?php

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
// Route::get('/{path}', function() {
//     return view('index');
// });

Route::view('/{any}', 'index')->where('any', '.*');
Route::get('/test','Helpers\TestController@export');

//////////////////////////////////////////////////////////////////

