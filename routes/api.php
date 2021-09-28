<?php

use App\Http\Controllers\Api\ProductController;
use App\Product;
use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('test', function (Request $request) {
    // dd($request->headers->all());
    // dd($request->headers->get('Authorization'));
    $response = new \Illuminate\Http\Response(json_encode(['msg' => 'a primeira resposta de api']));
    $response->header('Content-Type', 'application/json');

    return $response;
});

Route::namespace('Api')
        ->prefix('products')
        ->group(function() {

    Route::get('/',  'ProductController@index');
    Route::get('/{id}', 'ProductController@show');
    Route::post('/', 'ProductController@save');
    Route::put('/', 'ProductController@update');
    Route::delete('/{id}', 'ProductController@delete');

});
