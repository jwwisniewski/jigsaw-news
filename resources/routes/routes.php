<?php

Route::middleware('web')
    ->namespace('jwwisniewski\Jigsaw\News\Controllers')
    ->group(function () {
        Route::prefix('_admin')->group(function () {
            Route::prefix('news')->group(function () {
                Route::get('index', ['as' => 'news.index', 'uses' => 'NewsController@index']);
                Route::get('create', ['as' => 'news.create', 'uses' => 'NewsController@create']);
                Route::post('store', ['as' => 'news.store', 'uses' => 'NewsController@store']);
                Route::get('edit/{news}', ['as' => 'news.edit', 'uses' => 'NewsController@edit']);
                Route::post('update/{news}', ['as' => 'news.update', 'uses' => 'NewsController@update']);
                Route::get('destroy/{news}', ['as' => 'news.destroy', 'uses' => 'NewsController@destroy']);
            });
        });
    });
