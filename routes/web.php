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

Route::resource('projects', 'ProjectController');
Route::resource('ideas', 'IdeaController');
Route::resource('testings', 'TestingController');

Route::post('projects/{project}', 'CommentController@project');
Route::post('ideas/{idea}', 'CommentController@idea');
Route::post('testings/{testing}', 'CommentController@testing');
