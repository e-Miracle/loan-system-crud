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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function (){
    Route::post('loan/request', [\App\Http\Controllers\PropertiesController::class, 'create'])->name('loan.request');
    Route::get('loan/approve/{id}', [\App\Http\Controllers\PropertiesController::class, 'approve'])->name('loan.approve');
    Route::get('loan/reject/{id}', [\App\Http\Controllers\PropertiesController::class, 'reject'])->name('loan.reject');
    Route::get('loan/delete/{id}', [\App\Http\Controllers\PropertiesController::class, 'delete'])->name('loan.delete');
});
