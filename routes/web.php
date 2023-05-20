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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/users1', 'User1Controller@index');
$router->post('/addusers1', 'User1Controller@add');
$router->put('/update1/{id}', 'User1Controller@update'); 
$router->delete('/drop1/{id}', 'User1Controller@delete');