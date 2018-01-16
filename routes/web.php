<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('member/info', "MemberController@info");
Route::get('member/{user_id}',[
    'uses'  => 'MemberController@info',
    'as'    => 'memberinfo'
])->where('user_id','[0-9]+');


Route::get('student/testRequest1', "StudentController@testRequest1");
Route::get('student/test', "StudentController@test");
Route::get('student/query2', "StudentController@query2");
Route::get('student/orm1', "StudentController@orm1");
Route::get('student/orm2', "StudentController@orm2");

Route::any('tool/syncFiles', "ToolController@syncFiles");

Route::group(['middleware' => ['web']],function(){
    Route::get('student/testSession1', "StudentController@testSession1");
    Route::get('student/testSession2',[
        'as'    => 'testSession2',
        'uses'  => "StudentController@testSession2"]);
});

Route::get('student/testResponse', "StudentController@testResponse");

Route::get('testMiddleware', "StudentController@testMiddleware");
Route::group(['middleware' => ['TestMiddleware']], function(){
    Route::get('testMiddleware2', "StudentController@testMiddleware2");
    Route::get('testMiddleware3', "StudentController@testMiddleware3");
});
