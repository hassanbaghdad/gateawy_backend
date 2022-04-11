<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Products\products_controller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('admin')->middleware('api')->group(function() {

    Route::get('get-products', [products_controller::class, 'get_products']);
    Route::post('add-product', [products_controller::class, 'add_product']);
    Route::post('edit-product', [products_controller::class, 'edit_product']);
    Route::post('delete-product', [products_controller::class, 'delete_product']);

});

Route::prefix('client')->middleware('api')->group(function() {

    Route::post('get-productsModel', [products_controller::class, 'get_products']);


});
