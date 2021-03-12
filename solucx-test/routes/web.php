<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

Route::group(['namespace' => 'Api', 'prefix' => '/api', 'as' => 'api.'], function () {
    Route::group(['prefix' => '/clients', 'as' => 'clients.'], function () {
        Route::post('/', 'ClientController@store')->name('store');
        Route::get('/', 'ClientController@index')->name('index');
        Route::put('/{id}', 'ClientController@update')->name('update');
        Route::delete('/{id}', 'ClientController@destroy')->name('destroy');
    });

    Route::group(['prefix' => '/collaborators', 'as' => 'collaborators.'], function () {
        Route::post('/', 'CollaboratorController@store')->name('store');
        Route::get('/', 'CollaboratorController@index')->name('index');
        Route::put('/{id}', 'CollaboratorController@update')->name('update');
        Route::delete('/{id}', 'CollaboratorController@destroy')->name('destroy');
    });

    Route::group(['prefix' => '/stores', 'as' => 'stores.'], function () {
        Route::post('/', 'StoreController@store')->name('store');
        Route::get('/', 'StoreController@index')->name('index');
        Route::put('/{id}', 'StoreController@update')->name('update');
        Route::delete('/{id}', 'StoreController@destroy')->name('destroy');
    });

    Route::group(['prefix' => '/transactions', 'as' => 'transactions.'], function () {
        Route::post('/', 'TransactionController@store')->name('store');
        Route::put('/{id}', 'TransactionController@update')->name('update');
    });

    Route::group(['prefix' => '/evaluations', 'as' => 'evaluations.'], function () {
        Route::post('/', 'EvaluationController@store')->name('store');
        Route::get('/', 'EvaluationController@index')->name('index');
    });
});
