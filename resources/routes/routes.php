<?php
Route::middleware('web')
    ->namespace('jwwisniewski\Jigsaw\News\Controllers')
    ->group(function () {
        Route::prefix('_admin')->group(function () {
            Route::prefix('news')->group(function () {
                Route::get('index', array('as' => 'news.index', 'uses' => 'NewsController@index'));
                Route::get('create', array('as' => 'news.create', 'uses' => 'NewsController@create'));
                Route::post('store', array('as' => 'news.store', 'uses' => 'NewsController@store'));
                Route::get('edit/{news}', array('as' => 'news.edit', 'uses' => 'NewsController@edit'));
                Route::post('update/{news}', array('as' => 'news.update', 'uses' => 'NewsController@update'));
                Route::get('destroy/{news}', array('as' => 'news.destroy', 'uses' => 'NewsController@destroy'));
            });
        });
    });


