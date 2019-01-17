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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Events
Route::resource('event','EventController');
Route::get('event/{id}/speakers','EventController@getAllSpeakers');

Route::resource('talk','TalkController');
Route::resource('comment','CommentController');
//Talks

Route::group([

    'middleware' => 'auth:api',

], function ($router) {
  Route::post('event/signup','EventController@signup');
  Route::resource('question','QuestionController',['only'=>['destroy']]);

});


//Authentication
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
