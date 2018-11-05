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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', 'ArticleController@index');

Route::get('/category/{category_path}', 'ArticleController@showCategory');
Route::get('/article/{articles_id}', 'ArticleController@showArticle');
Route::get('/all', 'ArticleController@showAll');
Route::post('/article/{articles_id}', 'ArticleController@comment');
Route::get('/tag/{tag}', 'ArticleController@showTag');

