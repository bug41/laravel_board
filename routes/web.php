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

Route::get('/hello', function(){
    return view('hello');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('home/show','HomeController@show') ->name('home.show');

Route::get('/create','laravelTestController@create')->name('laravelTest.create'); //페이지 생성
Route::post('/create','laravelTestController@store')->name('laravelTest.store'); //

Route::get('/mypage','MypageController@index')->name('mypage'); 
Route::post('/modify','MypageController@modify')->name('modify');

Route::get('/boards','BoardController@boards')->name('boards');
Route::get('/insert','BoardController@insert')->name('insert');
Route::get('/view','BoardController@view')->name('view');
Route::get('/deleteBoards','BoardController@deleteBoards')->name('deleteBoards');

Route::post('insert_proc','BoardController@insert_proc')->name('insert_proc');