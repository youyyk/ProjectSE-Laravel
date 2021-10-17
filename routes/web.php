<?php

use Illuminate\Support\Facades\Auth;
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
})->middleware(['auth']);

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



Route::resource('users', \App\Http\Controllers\UserController::class)->middleware(['auth','admin']);
Route::resource('menus', \App\Http\Controllers\MenuController::class)->middleware(['auth','admin']);
Route::resource('resTables', \App\Http\Controllers\RestTableController::class)->middleware(['auth','frontWorker']);
Route::resource('departments', \App\Http\Controllers\DepartmentController::class)->middleware(['auth','admin']);

Route::resource('bills',\App\Http\Controllers\BillController::class)->middleware(['auth','frontWorker']);
Route::resource('carts',\App\Http\Controllers\CartController::class)->middleware(['auth','frontWorker']);

// filter menu
Route::resource('charts',\App\Http\Controllers\ChartController::class)->middleware(['auth','admin']);
// User Admin View
Route::get('/user/filter', [\App\Http\Controllers\UserController::class, "searchCard"])->middleware(['auth','admin'])
    ->name('user.filter');
// Menu Admin View
Route::get('/menu/filter', [\App\Http\Controllers\MenuController::class,"filterAdmin"])->middleware(['auth','admin'])
    ->name('menu.filter');
Route::get('/menu/filter/chooseMenu/{tableId}', [\App\Http\Controllers\MenuController::class,"filterFrontWorker"])->middleware(['auth','frontWorker'])
    ->name('menu.filter.chooseMenu');

// Charts
Route::get('/dayLine', [\App\Http\Controllers\ChartController::class, "dayLine"])->middleware(['auth','admin'])
    ->name('day.line');
Route::get('/monthLine', [\App\Http\Controllers\ChartController::class, "monthLine"])->middleware(['auth','admin'])
    ->name('month.line');
Route::get('/yearLine', [\App\Http\Controllers\ChartController::class, "yearLine"])->middleware(['auth','admin'])
    ->name('year.line');
Route::get('/dayBar', [\App\Http\Controllers\ChartController::class, "dayBar"])->middleware(['auth','admin'])
    ->name('day.bar');
Route::get('/monthBar', [\App\Http\Controllers\ChartController::class, "monthBar"])->middleware(['auth','admin'])
    ->name('month.bar');
Route::get('/yearBar', [\App\Http\Controllers\ChartController::class, "yearBar"])->middleware(['auth','admin'])
    ->name('year.bar');

// ChooseMenu View
Route::get('/menu/choose/{tableId}', [\App\Http\Controllers\MenuController::class,"chooseMenuIndex"])->middleware(['auth','frontWorker'])
    ->name('menu.choose.index');
Route::get('/cart/add/{cart}/{menuId}', [\App\Http\Controllers\CartController::class,"addMenu"])->middleware(['auth','frontWorker'])
    ->name('cart.add');
Route::get('/cart/{action}/{cart}/{menuId}', [\App\Http\Controllers\CartController::class,"addMenuTotal"])->middleware(['auth','frontWorker'])
    ->name('cart.value');
Route::get('/bill/order/{cart}/{user_id}/{type}', [\App\Http\Controllers\BillController::class, 'createBill'])->middleware(['auth','frontWorker'])
    ->name('bill.create.manual');
// All Bills this Table
Route::get('/bill/{resTable}', [\App\Http\Controllers\BillController::class, 'showAllBills'])->middleware(['auth','frontWorker'])
    ->name('bill.show.table');
Route::get('/bill/cancel/{bill}/{menuId}', [\App\Http\Controllers\BillController::class, 'cancelMenuInBill'])->middleware(['auth','frontWorker'])
    ->name('bill.cancel.menu');
Route::get('/bill/pay/{resTable}/allBill', [\App\Http\Controllers\BillController::class, 'payBills'])->middleware(['auth','frontWorker'])
    ->name('bill.pay.table');
// Bill BackWorker View
Route::get('/backWorker', [\App\Http\Controllers\BillController::class, 'indexBackWorker'])->middleware(['auth','backWorker'])
    ->name('backWorker');
Route::get('/bill/{bill}/{menuId}/update/status', [\App\Http\Controllers\BillController::class, 'updateStatus'])->middleware(['auth','backWorker'])
    ->name('bill.menu.update.status');
// Res Table for Admin
Route::get('/showAllTable', [\App\Http\Controllers\RestTableController::class, "showAllResTable"])->middleware(['auth','admin'])
    ->name('showAllResTable');
// Bill Take Away View
Route::get('/takeAway', [\App\Http\Controllers\BillController::class, 'showTakeAwayBills'])->middleware(['auth','frontWorker'])
    ->name('bill.show.takeaway');
Route::get('bill/pay/takeAway/{bill}', [\App\Http\Controllers\BillController::class, 'payBill'])->middleware(['auth','frontWorker'])
    ->name('bill.pay.takeaway');

