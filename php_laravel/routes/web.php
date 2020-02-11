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
// 一覧
Route::get('/expense', 'ExpenseController@index')->name('expense.list');
Route::get('/expense/category', 'CategoryController@index')->name('category.list');
// 新規
Route::get('/expense/new', 'ExpenseController@create')->name('expense.new');
Route::get('/expense/category/new', 'CategoryController@create')->name('category.new');
// 登録
Route::post('/expense', 'ExpenseController@store')->name('expense.store');
Route::post('/expense/category', 'CategoryController@store')->name('category.store');
// 編集
Route::get('/expense/edit/{id}', 'ExpenseController@edit')->name('expense.edit');
Route::get('/expense/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
// 更新
Route::post('/expense/update/{id}', 'ExpenseController@update')->name('expense.update');
Route::post('/expense/category/update/{id}', 'CategoryController@update')->name('category.update');
// 詳細
Route::get('/expense/{id}', 'ExpenseController@show')->name('expense.detail');
Route::get('/expense/category/{id}', 'CategoryController@show')->name('category.detail');
// 削除
Route::delete('/expense/{id}', 'ExpenseController@destroy')->name('expense.destroy');
Route::delete('/expense/category/{id}', 'CategoryController@destroy')->name('category.destoroy');

Route::get('/', function () {
    return redirect('/expense');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
