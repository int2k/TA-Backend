<?php

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

$app->get('/', function () use ($app) {
    return $app->version();
//    return view('home', ['version' => $app->version()]);
});
$app->get('/product', function () use ($app) {
//    return $app->version();
    return view('product', ['version' => $app->version()]);
});
$app->get('/category', function () use ($app) {
//    return $app->version();
    return view('category', ['version' => $app->version()]);
});
$app->group(['prefix' => 'api/v1','namespace' => 'App\Http\Controllers'], function($app)
{
    $app->get('product','ProductController@index');
    $app->get('product/{id}','ProductController@getproduct');
    $app->post('product','ProductController@createProduct');
    $app->put('product/{id}','ProductController@updateProduct');
    $app->delete('product/{id}','ProductController@deleteProduct');

    $app->get('category','CategoryController@index');
    $app->get('category/{id}','CategoryController@getcategory');
    $app->post('category','CategoryController@createCategory');
    $app->put('category/{id}','CategoryController@updateCategory');
    $app->delete('category/{id}','CategoryController@deleteCategory');
});