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
Route::resource('carts',\App\Http\Controllers\CartController::class);

// filter menu
Route::get('/menu/filter', [\App\Http\Controllers\MenuController::class,"filterAdmin"])
    ->name('menu.filter');
Route::get('/menu/filter/chooseMenu/{tableId}', [\App\Http\Controllers\MenuController::class,"filterFrontWorker"])
    ->name('menu.filter.chooseMenu');

// ChooseMenu View
Route::get('/menu/choose/{tableId}', [\App\Http\Controllers\MenuController::class,"chooseMenuIndex"])
    ->name('menu.choose.index');
Route::get('/cart/add/{cart}/{menuId}', [\App\Http\Controllers\CartController::class,"addMenu"])
    ->name('cart.add');
Route::get('/cart/{action}/{cart}/{menuId}', [\App\Http\Controllers\CartController::class,"addMenuTotal"])
    ->name('cart.value');
Route::get('/bill/{cart}/{user_id}', [\App\Http\Controllers\BillController::class, 'createBill'])
    ->name('bill.create.manual');
// All Bills this Table
Route::get('/bill/{resTable}', [\App\Http\Controllers\BillController::class, 'showAllBills'])
    ->name('bill.show.table');
Route::get('/bill/cancel/{bill}/{menuId}', [\App\Http\Controllers\BillController::class, 'cancelMenuInBill'])
    ->name('bill.cancel.menu');
Route::get('/bill/pay/{resTable}/all', [\App\Http\Controllers\BillController::class, 'payBills'])
    ->name('bill.pay.table');
// Bill BackWorker View
Route::get('/backWorker', [\App\Http\Controllers\BillController::class, 'indexBackWorker'])
    ->name('backWorker');
Route::get('/bill/{bill}/{menuId}/update/status', [\App\Http\Controllers\BillController::class, 'updateStatus'])
    ->name('bill.menu.update.status');
