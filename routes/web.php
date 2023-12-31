<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\product\ProductsController;
use App\Http\Controllers\order\OrdersController;
use App\Http\Controllers\HomeController;


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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('Home');


//products 
Route::resource('/Inventory', ProductsController::class)->names('Inventory');

Route::resource('/Orders', OrdersController::class)->names('Orders');


Route::get('/ProductOrder/{id}', [OrdersController::class,'productOrder'])->name('productOrder');





