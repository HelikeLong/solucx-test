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

$router->group(['prefix' => '/api', 'as' => 'api.'], function () use ($router) {
    $router->group(['prefix' => '/clients', 'as' => 'clients.'], function () use ($router) {
        $router->get('/', 'ClientController@all');
        $router->post('/', 'ClientController@store');
        $router->put('/{id}', 'ClientController@update');
        $router->delete('/{id}', 'ClientController@delete');
    });

    $router->group(['prefix' => '/collaborators', 'as' => 'collaborators.'], function () use ($router) {
        $router->get('/', 'CollaboratorController@all');
        $router->post('/', 'CollaboratorController@store');
        $router->put('/{id}', 'CollaboratorController@update');
        $router->delete('/{id}', 'CollaboratorController@delete');
    });

    $router->group(['prefix' => '/stores', 'as' => 'stores.'], function () use ($router) {
        $router->get('/', 'StoreController@all');
        $router->post('/', 'StoreController@store');
        $router->put('/{id}', 'StoreController@update');
        $router->delete('/{id}', 'StoreController@delete');
    });

    $router->group(['prefix' => '/transactions', 'as' => 'transactions.'], function () use ($router) {
        $router->post('/', 'TransactionController@store');
        $router->put('/{id}', 'TransactionController@update');
    });

    $router->group(['prefix' => '/evaluations', 'as' => 'evaluations.'], function () use ($router) {
        $router->get('/', 'EvaluationController@all');
        $router->post('/', 'EvaluationController@store');
    });
});
