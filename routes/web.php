<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\AuthController;
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


//board routes
$router->get('/boards','BoardController@index');
$router->get('/boards/{id}', 'BoardController@show');
$router->post('/boards/store', 'BoardController@store');

//authentication routes
$router->post('/register','AuthController@register');
$router->post('/login','AuthController@login');
$router->get('/logout','AuthController@logout');
