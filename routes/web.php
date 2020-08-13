<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middlewasre group. Now create something great!
|
*/

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController@index');
    Route::resource('/product', 'ProductController');
    Route::resource('/category', 'CategoryController');
    Route::resource('/unit', 'UnitController');
    Route::resource('/transaction', 'TransactionController');
    Route::resource('/customer', 'CustomerController');
    Route::get('/jurnal', 'Jurnal@index');
    Route::resource('/employee', 'EmployeeController');
    Route::get('/report/pdf/permonth', 'ReportController@permonth')->name('report.permonth');
    Route::get('/report/pdf/perday', 'ReportController@perday')->name('report.perday');
    Route::get('/report/pdf/perweek', 'ReportController@perweek')->name('report.perweek');
    Route::resource('/report', 'ReportController');
    Route::resource('/role', 'RoleController');
    Route::resource('/account', 'AccountController');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
