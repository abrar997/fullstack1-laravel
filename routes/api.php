<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

// Route::resource('bank', BankController::class);
Route::resource('form', ProductsController::class); #register
Route::resource('login', LoginController::class); #login
Route::post('shop', [MarketController::class, 'AddProduct']); #add products
Route::get('list', [MarketController::class, 'list']); #list product
// add params to can delete depending on id by using delete method
Route::delete('delete/{id}', [MarketController::class, 'delete']); #list product
// get single products depending on id
Route::get('single/{id}', [MarketController::class, 'getProduct']);
Route::get('find/{key}', [MarketController::class, 'search']);
