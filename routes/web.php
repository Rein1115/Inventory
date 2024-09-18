<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Supplier\SupplierController;
use App\Http\Controllers\Brand\BrandController;
use App\Http\Controllers\Clinic\ClinicController;
use App\Http\Controllers\select2\SelectController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Freebies\FreebiesController;
use App\Http\Controllers\Expenses\ExpensesController;
use App\Http\Controllers\Email\EmailpaymentController;

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
    return view('auth.login');
});


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Auth::routes(['register' => false]);
Route::middleware(['auth','check.active'])->group(function () {
    Route::get('/', function () {
        return view('home');
    });

    Route::resource('user', UserController::class);
    

    Route::get('selectsupplier', [SelectController::class, 'supplier']);
    Route::get('selectbrand', [SelectController::class, 'brand']);
    Route::resource('supplier', SupplierController::class);
    // Route::resource('clinic', ClinicController::class);
    Route::resource('brand', BrandController::class)->names('brand');
    Route::resource('order', OrderController::class);
    Route::resource('product', ProductController::class);

    Route::get('selectorderall', [OrderController::class, 'selectorderall']);

    Route::get('selectorderindi/{id}', [OrderController::class, 'selectorderindi']);
    Route::get('Productslist', [OrderController::class, 'Productslist']);
    Route::get('deleteupquan', [OrderController::class, 'deleteupquan']);
    Route::get('producthistory', [ProductController::class, 'producthistory'])->name('producthistory');
    Route::resource('payment', PaymentController::class);

    Route::post('destroymodification/{id}', [PaymentController::class, 'destroymodification']);
    // profile
    Route::resource('profile', ProfileController::class);


    // freebies
    Route::resource('freebies', FreebiesController::class);


    // dashboard
    Route::get('/home', [DashboardController::class, 'dashboardcard'])->name('dashboard');
    Route::get('/', [DashboardController::class, 'dashboardcard'])->name('dashboard');
    Route::get('dashboardgraph', [DashboardController::class, 'dashboardgraph'])->name('dashboardgraph');
    Route::get('dashdunot', [DashboardController::class, 'dashboardunot'])->name('dashdunot');






    Route::resource('expenses', ExpensesController::class);
    Route::get('individualexpenses/{id}', [ExpensesController::class,'getIndividualexpenses'])->name('individualexpenses');


    // payment email individual 
    Route::resource('paymentemail',EmailpaymentController::class)->names('paymentemail');


});
