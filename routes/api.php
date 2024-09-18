<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Supplier\SupplierController;
use App\Http\Controllers\Brand\BrandController;
use App\Http\Controllers\Clinic\ClinicController;
use App\Http\Controllers\select2\SelectController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Order\TestController;
use App\Http\Controllers\Freebies\FreebiesController;
use App\Http\Controllers\Expenses\ExpensesController;
use App\Http\Controllers\Email\EmailpaymentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get('selectsupplier', [SelectController::class, 'supplier']);
Route::get('selectbrand', [SelectController::class, 'brand']);
Route::get('Productslist', [OrderController::class, 'Productslist']);
Route::get('producthistory', [ProductController::class, 'producthistory']);

Route::get('dashboard', [DashboardController::class, 'dashboardcard'])->name('dashboard');

Route::get('dashboardgraph', [DashboardController::class, 'dashboardgraph'])->name('dashboardgraph');
Route::get('dashdunot', [DashboardController::class, 'dashboardunot'])->name('dashdunot');

Route::resource('payment', PaymentController::class);

Route::resource('user', UserController::class);

Route::resource('freebies', FreebiesController::class);

Route::resource('expenses', ExpensesController::class);


Route::resource('paymentemail',EmailpaymentController::class)->names('paymentemail');

Route::get('individualexpenses/{id}', [ExpensesController::class,'getIndividualexpenses'])->name('individualexpenses');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('supplier', SupplierController::class);
Route::resource('clinic', ClinicController::class);
Route::resource('brand', BrandController::class);
Route::resource('order', OrderController::class);
Route::resource('product', ProductController::class);