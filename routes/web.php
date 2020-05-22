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

Route::get('/', 'PageController@home')->name('home');

Route::get('/cate/{id}', 'PageController@cate')->name('cate');

Route::get('/detail/{id}', 'PageController@detail' )->name('detail');

Auth::routes();

Route::group([ 'middleware'=> 'auth'],function(){

    Route::post('/comment', 'PageController@comment')->name('comment');

    Route::post('/replycomment', 'PageController@replyComment')->name('replycomment');

    Route::get('403', function (){
        return view('admin.403');
    })->name('403');

    Route::group(['prefix'=> 'admin',] , function () {

        Route::get('/home', "Admin\HomeController@index")->name('homeAdmin');


        Route::get('/post', 'Admin\PostController@index')->name('list-post');

        Route::post('/postData', 'Admin\PostController@postData')->name('data-post');

        Route::get('/post/detail/{id}', 'Admin\PostController@detroy')->name('detail-post');

        Route::get('/post/add', 'Admin\PostController@create')->name('add-post');

        Route::post('/post/add', 'Admin\PostController@store')->name('add-post-save');

        Route::get('/post/edit/{id}', 'Admin\PostController@show')->name('edit-post');

        Route::post('/post/edit/{id}', 'Admin\PostController@update')->name('edit-post-save');

        Route::get('/post/detroy/{id}', 'Admin\PostController@detroy')->name('detroy-post');


        Route::get('/comment', 'Admin\CommentController@index')->name('list-comment');

        Route::get('comment/detroy/{id}','Admin\CommentController@detroy')->name('detroy-comment');

        Route::get('/comment/list-reply/{id}', 'Admin\CommentController@listReply')->name('list-reply');

        Route::post('/comment/list-reply/{id}', 'Admin\CommentController@replyComment')->name('reply-comment');

        Route::get('comment/detroy/reply/{id}', 'Admin\CommentController@detroyReply')->name('detroy-reply');


        Route::get('category', 'Admin\CategoryController@index')->name('list-category');

        Route::get('category/add', 'Admin\CategoryController@create')->name('add-category');

        Route::post('category/add', 'Admin\CategoryController@store')->name('add-category-save');

        Route::get('category/edit/{id}', 'Admin\CategoryController@show')->name('edit-category');

        Route::post('category/edit/{id}', 'Admin\CategoryCOntroller@update')->name('edit-category-save');

        Route::get('category/detroy/{id}', 'Admin\CategoryController@detroy')->name('detroy-category');


        Route::get('user', 'Admin\UserController@index')->name('list-user');

        Route::get('user/add', 'Admin\UserController@create')->name('add-user');

        Route::post('user/add','Admin\UserController@store')->name('add-user-save');

        Route::get('user/edit/{id}', 'Admin\UserController@show')->name('edit-user');

        Route::post('user/edit/{id}', 'Admin\UserController@update')->name('edit-user-save');


        Route::get('role', 'Admin\RoleController@index')->name('list-role');

        Route::get('role/add','Admin\RoleController@create')->name('add-role');

        Route::post('role/add','Admin\RoleController@store')->name('add-role-save');

        Route::get('role/edit/{id}','Admin\RoleController@show')->name('edit-role');

        Route::post('role/edit/{id}', 'Admin\RoleController@update')->name('edit-role-save');

        Route::get('role/detroy/{id}', 'Admin\RoleController@detroy')->name('detroy-role');
    });
});

Route::get('/demo', 'PageController@demo')->name('demo');

Route::get('/login', 'PageController@login')->name('sign-in');

Route::post('/login1', 'Auth\LoginController@login')->name('login');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/create', 'PageController@create')->name('create');

Route::post('/create', 'PageController@createAccount')->name('create-account');

Route::get('/asd', function (){
    return view('layouts.app');
});
