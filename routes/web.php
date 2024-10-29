<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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

Auth::routes();

route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/users', [UserController::class, 'index']);


route::resource('/orders', 'OrderController');//orders.index
route::resource('/suppliers', 'SuppliersController');//suppliers.index
route::resource('/products', 'ProductController');//products.index
route::resource('/users', 'UserController');//users.index
route::resource('/companies', 'CompanyController');//companies.index
route::resource('/transactions', 'TransactionsController');//transactions.index

route::resource('/cashiers', 'CashierController');//cashiers.index
route::resource('/reports', 'ReportController');//reports.index
route::resource('/customers', 'CustomerController');//customers.index
route::resource('/incomings', 'IncomingController');//incomings.index
