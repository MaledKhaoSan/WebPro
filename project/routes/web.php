<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KitchenOrderController;
use App\Http\Controllers\MenuManagementController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/queue', function () {
    return view('queue');
});

Route::get('/kitchenorder', function () {
    return view('kitchenorder');
});
Route::get('/kitchenorder', [KitchenOrderController::class, 'index']);


Route::get('/menumanagement', function () {
    return view('menumanagement');
});
Route::get('/menumanagement', [MenuManagementController::class, 'index']);
Route::post('/menumanagement/update/{menuId}', [MenuManagementController::class, 'update'])->name('menu.update');
Route::post('/menumanagement/add', [MenuManagementController::class, 'add'])->name('menu.add');




