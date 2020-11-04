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
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::get('/leaderboard', 'PagesController@leaderboard');
Route::resource('quizzes', 'QuizzesController');
Route::resource('questions', 'QuestionsController');
Route::resource('results', 'ResultsController');
Route::resource('colleagues', 'ColleaguesController');
Route::get('/create_result/{quiz_id}', 'ResultsController@create_result');
Route::get('/create_question/{quiz_id}', 'QuestionsController@create_question');
Route::get('/finish/{result_id}', 'ResultsController@finish');
Route::get('/quiz_delete/{quiz_id}', 'QuizzesController@quiz_delete');
Route::get('/question_delete/{question_id}', 'QuestionsController@question_delete');
Route::get('/colleague_delete/{colleague_id}', 'ColleaguesController@colleague_delete');
Route::resource('answers', 'AnswersController');
Route::get('/resources', 'PagesController@resources')->name('resources.index');
Route::get('/activities', 'PagesController@activities')->name('activities.index');
Route::get('/account', 'PagesController@account')->name('account.index');
Route::get('/social', 'PagesController@social')->name('social.index');
Route::get('/ranking', 'PagesController@ranking')->name('ranking.index');
Auth::routes(['reset' => false]);
Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

Route::get('/login/google', 'Auth\LoginController@redirectToProvider');
Route::get('/login/google/callback', 'Auth\LoginController@handleProviderCallback');