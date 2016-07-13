<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return 'Todo List API v1';
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::get('/v1/lists', ['uses' => 'ListsController@index','middleware'=>'simpleauth']);

Route::post('/v1/lists', ['uses' => 'ListsController@create','middleware'=>'simpleauth']);

Route::get('/v1/lists/{id}', ['uses' => 'ListsController@index','middleware'=>'simpleauth']);

Route::put('/v1/lists/{id}', ['uses' => 'ListsController@update','middleware'=>'simpleauth']);

Route::delete('/v1/lists/{id}', ['uses' => 'ListsController@delete','middleware'=>'simpleauth']);


Route::get('/v1/lists/{id}/tasks', ['uses' => 'TasksController@index','middleware'=>'simpleauth']);

Route::post('/v1/lists/{id}/tasks', ['uses' => 'TasksController@create','middleware'=>'simpleauth']);

Route::get('/v1/lists/{id}/tasks/{taskid}', ['uses' => 'TasksController@index','middleware'=>'simpleauth']);

Route::put('/v1/lists/{id}/tasks/{taskid}', ['uses' => 'TasksController@update','middleware'=>'simpleauth']);

Route::delete('/v1/lists/{id}/tasks/{taskid}', ['uses' => 'TasksController@delete','middleware'=>'simpleauth']);
