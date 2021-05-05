<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MakeController;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\BodyController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\ValuationController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CheckValuationController;
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
Route::get('comparison',[CheckValuationController::class,'show']);
Route::get('deletecomparison',[CheckValuationController::class,'destroy'])->name('deletecomparison');
Route::get('/', [CheckValuationController::class,'index']);
Route::post('/storevalue', [CheckValuationController::class,'store'])->name('storevalue');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('company',CompanyController::class);
Route::resource('make',MakeController::class);
Route::resource('modal',ModalController::class);
Route::resource('body',BodyController::class);
Route::resource('year',YearController::class);
Route::resource('valuation',ValuationController::class);
Route::post('getmake',[CheckValuationController::class,'getmake'])->name('getmake');
Route::post('getmodal',[CheckValuationController::class,'getmodal'])->name('getmodal');
Route::post('getbody',[CheckValuationController::class,'getbody'])->name('getbody');
Route::post('getyearvalue',[CheckValuationController::class,'getyearvalue'])->name('getyearvalue');
Route::get('countcp',[CheckValuationController::class,'countcp'])->name('countcp');
Route::get('aldar',function(){
	return "Siddhsh";
});

