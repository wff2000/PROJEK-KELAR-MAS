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
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/question/create','QuestionController@create');
Route::post('/question','QuestionController@store');
Route::get('/question','QuestionController@index');
Route::delete('question/{question_id}','QuestionController@destroy');
Route::get('/question/{question_id}/edit','QuestionController@edit');
Route::put('/question/{question_id}','QuestionController@update');

Route::get('/question/show','QuestionController@show');

Route::get('/question/explore', 'ExplorerController@index');
Route::get('/question/explore/{question_id}','ExplorerController@show');

Route::post('/question/comment/explorer/{question_id}','QuestionCommentsController@store');

Route::post('/answer/explorer/{question_id}', 'AnswerController@store');

Route::post('/answer/comment/explorer/{answer_id}','AnswerCommentsController@store');

Route::post('/vote/up/question/create/{question_id}','QuestionVoteController@Upstore');
Route::post('/vote/down/question/create/{question_id}','QuestionVoteController@Downstore');

Route::post('/vote/up/answer/create/{question_id}','AnswerVoteController@Upstore');
Route::post('/vote/down/answer/create/{question_id}','AnswerVoteController@Downstore');
Route::put('/answer/approve/{answer_id}','AnswerVoteController@update');


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
