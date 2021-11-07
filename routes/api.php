<?php

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

Route::apiResource('menus',\App\Http\Controllers\Api\MenuController::class);
Route::apiResource('resTables',\App\Http\Controllers\Api\ResTableController::class);
Route::apiResource('departments',\App\Http\Controllers\Api\DepartmentController::class);
Route::apiResource('users',\App\Http\Controllers\Api\UserController::class);
Route::apiResource('bills',\App\Http\Controllers\Api\BillController::class);
Route::apiResource('carts',\App\Http\Controllers\Api\CartController::class);
