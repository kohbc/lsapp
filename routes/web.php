<?php

use Illuminate\Support\Facades\Route;

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
//localhost/project_tea/public
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::get('/leaderboard', 'PagesController@leaderboard');
Route::resource('quizzes', 'QuizzesController');
Route::resource('questions', 'QuestionsController');
Route::resource('results', 'ResultsController');
Route::get('/create_result/{quiz_id}', 'QuestionsController@create_result');
Route::get('/create_question/{quiz_id}', 'QuestionsController@create_question');
Route::get('/question_next/{quiz_id}/{counting}', 'QuestionsController@question_next');
Route::resource('answers', 'AnswersController');
Route::get('/resources', 'PagesController@resources')->name('resources.index');
Route::get('/activities', 'PagesController@activities')->name('activities.index');
Route::get('/account', 'PagesController@account')->name('account.index');
Route::get('/social', 'PagesController@social')->name('social.index');
Route::get('/ranking', 'PagesController@ranking')->name('ranking.index');

/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello World';
});

Route::get('/users/{id}/{name}', function($id, $name){
    return 'This is user '.$name.' with an id of '.$id;
});

Route::get('/home', 'HomeController@index')->name('home');
*/
Auth::routes();
Route::get('/dashboard', 'DashboardController@index');

Route::get('/login/google', 'Auth\LoginController@redirectToProvider');
Route::get('/login/google/callback', 'Auth\LoginController@handleProviderCallback');