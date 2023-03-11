<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

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
    // return view('home');
    return redirect()->route('admin.home');
});
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);


Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    Route::get('',[DashboardController::class ,'index'])->name('home');
    Route::resource('clients', ClientController::class);
    Route::resource('emploies', EmployeController::class);
    Route::post('clientsupdate/{id}',[ClientController::class ,'clientsupdate'])->name('clientsupdate');
    Route::post('employupdate/{id}',[EmployeController::class ,'employupdate'])->name('employupdate');
    Route::post('ordersedit/{id}',[OrderController::class ,'ordersedit'])->name('ordersedit');
    Route::post('itemsedit/{id}',[OrderController::class ,'itemsedit'])->name('itemsedit');
    Route::post('orderfeedback/{id}',[OrderController::class ,'orderfeedback'])->name('orderfeedback');
    Route::get('orderupdatenot/{id}',[OrderController::class ,'orderupdatenot'])->name('orderupdatenot');
    Route::resource('roles', RoleController::class);
    // Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('items', OrderController::class);
    Route::resource('costs', CostController::class);
    Route::resource('profits', ProfileController::class);


    Route::get('waitorder',[ItemController::class ,'waitorder'])->name('waitorder');
    Route::get('buyorder',[ItemController::class ,'buyorder'])->name('buyorder');
    Route::get('shopingorder',[ItemController::class ,'shopingorder'])->name('shopingorder');
    Route::get('Deliveryprogresorder',[ItemController::class ,'Deliveryprogresorder'])->name('Deliveryprogresorder');
    Route::get('Deliveryorder',[ItemController::class ,'Deliveryorder'])->name('Deliveryorder');
    Route::get('referenceorder',[ItemController::class ,'referenceorder'])->name('referenceorder');
    Route::get('feedback',[ItemController::class ,'feedback'])->name('feedback');
    Route::get('password',[DashboardController::class ,'password'])->name('password');
    Route::post('passwordupdate',[DashboardController::class ,'passwordupdate'])->name('passwordupdate');
    Route::get('printprofit/{id}',[ProfileController::class ,'printprofit'])->name('printprofit');


});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
