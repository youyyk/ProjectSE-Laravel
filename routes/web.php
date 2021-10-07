<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('users',\App\Http\Controllers\UserController::class);
Route::resource('menus',\App\Http\Controllers\MenuController::class);
Route::resource('resTables',\App\Http\Controllers\RestTableController::class);
Route::resource('departments',\App\Http\Controllers\DepartmentController::class);
Route::resource('bills',\App\Http\Controllers\BillController::class);


Route::get('/menu/choose/{tableId}', [\App\Http\Controllers\MenuController::class,"chooseMenuIndex"])
    ->name('menu.choose.index');
Route::get('/backWorker', [\App\Http\Controllers\BillController::class, 'indexBackWorker'])
    ->name('backWorker');
