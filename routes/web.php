<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeController;
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

});
