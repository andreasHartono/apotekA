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

Route::get('/home', function () {
   return view('home');
});

Route::resource('medicines', 'MedicineController');
Route::resource('categories', 'CategoryController');
Route::get('coba1', 'MedicineController@coba1');
Route::get('coba2', 'MedicineController@coba2');
Route::post('/medicines/showInfo', 'MedicineController@showInfo')->name('medicines.showInfo');
Route::get('showgrid', 'MedicineController@showgrid');
Route::get('report/listmedicine/{id}', 'CategoryController@showlist');
Route::get('report/listhighestprice', 'MedicineController@showlisthighestprice');
Route::resource('transactions', 'TransactionController');
Route::post('transactions/showDataAjax', 'TransactionController@showajax')->name('transaction.showAjax');



Route::middleware(['auth'])->group(function () {
   Route::resource('suppliers', 'SupplierController');
   Route::post('/suppliers/getEditForm', 'SupplierController@getEditForm')->name('supplier.getEditForm');
   Route::post('/suppliers/getEditForm2', 'SupplierController@getEditForm2')->name('supplier.getEditForm2');
   Route::post('/suppliers/saveData', 'SupplierController@saveData')->name('supplier.saveData');
   Route::post('/suppliers/deleteData', 'SupplierController@deleteData')->name('supplier.deleteData');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');