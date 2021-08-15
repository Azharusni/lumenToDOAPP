<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\CarddController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListController;
use Illuminate\Support\Str;

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

//generate App key
$router->get('/key', function(){
    return Str::random(32);
});

$router->get('/foo', function(){
    return "Hallo usni";
});

//authentication routes
$router->post('/register','AuthController@register');
$router->post('/login','AuthController@login');
$router->get('/logout','AuthController@logout');


//board routes
$router->get('/boards','BoardController@index');
$router->get('/boards/{boardId}', 'BoardController@show');
$router->post('/boards/store', 'BoardController@store');
$router->put('/boards/{boardId}', 'BoardController@update');
$router->delete('/boards/{boardId}', 'BoardController@destroy');

//list routes
$router->get('/boards/{boardId}/list', 'ListController@index');
$router->post('/boards/{boardId}/list', 'ListController@store');
$router->get('/boards/{boardId}/list/{listId}', 'ListController@show');
$router->put('/boards/{boardId}/list/{listId}', 'ListController@update');
$router->delete('/boards/{boardId}/list/{listId}', 'ListController@destroy');

//Card routes
$router->get('/boards/{boardId}/list/{listId}/card', 'CardController@index');
$router->post('/boards/{boardId}/list/{listId}/card', 'CardController@store');
$router->get('/boards/{boardId}/list/{listId}/card/{cardId}', 'CardController@show');
$router->put('/boards/{boardId}/list/{listId}/card/{cardId}', 'CardController@update');
$router->delete('/boards/{boardId}/list/{listId}/card/{cardId}', 'CardController@destroy');
