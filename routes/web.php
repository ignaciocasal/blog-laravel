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

Auth::routes();

Route::get('/',[
    'uses'  => 'HomeController@index',
    'as'    => 'home.index'
]);

Route::get('home', [
    'uses'  => 'HomeController@index',
    'as'    => 'home.index'
]);

Route::get('categories/{name}', [
    'uses'  => 'HomeController@searchCategory',
    'as'    => 'home.search.category'
]);

Route::get('tags/{name}', [
    'uses'  => 'HomeController@searchTag',
    'as'    => 'home.search.tag'
]);

Route::get('articles/{slug}', [
    'uses'  => 'HomeController@viewArticle',
    'as'    => 'home.view.article'
]);

Route::group(['prefix' => 'admin','middleware' => 'auth'], function(){

    Route::resource('users','UsersController');
    Route::get('users/{id}/destroy', [
        'uses'  => 'UsersController@destroy',
        'as'    => 'users.destroy'
    ]);

    Route::resource('categories','CategoriesController');
    Route::get('categories/{id}/destroy', [
        'uses'  => 'CategoriesController@destroy',
        'as'    => 'categories.destroy'
    ]);

    Route::resource('tags','TagsController');
    Route::get('tags/{id}/destroy', [
        'uses'  => 'TagsController@destroy',
        'as'    => 'tags.destroy'
    ]);

    Route::resource('articles','ArticlesController');
    Route::get('articles/{id}/destroy', [
        'uses'  => 'ArticlesController@destroy',
        'as'    => 'articles.destroy'
    ]);

    Route::get('images', [
        'uses'  => 'ImagesController@index',
        'as'    => 'images.index'
    ]);
});

