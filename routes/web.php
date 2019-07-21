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

    Route::get('categories', ['uses' => 'CategoryController@getIndex', 'as' => 'categories.index']);

    Route::post('comments/{post_id}');

    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    
    Route::get('password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );

    Route::get('question', ['uses' => 'QuestionController@getIndex', 'as' => 'question.index']);

    Route::get('question/{slug}', ['uses' => 'QuestionController@getSingle', 'as' => 'question.single'])
        ->where('slug', '[\w\d\-\_]+');

    Route::get('about', 'PagesController@getAbout');

    Route::get('contact', 'PagesController@getContact');

    Route::post('contact', 'PagesController@postContact');

    Route::get('/', 'PagesController@getIndex');

    Route::resource('posts', 'PostController');
