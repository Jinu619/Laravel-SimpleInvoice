<?php

use App\Http\Controllers\InvoiceController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[\App\Http\Controllers\registerController::class,'index']);
Route::post('register',[\App\Http\Controllers\registerController::class,'register']);
Route::get('login',[\App\Http\Controllers\registerController::class,'login']);
Route::post('dologin',[\App\Http\Controllers\registerController::class,'dologin']);


Route::get('home',[\App\Http\Controllers\homeController::class,'home'])->name('addinvoice');
Route::get('logout',[\App\Http\Controllers\registerController::class,'logout'])->name('logout');;

Route::post('additem',[\App\Http\Controllers\itemController::class,'additem']);

Route::resource('/invoices',InvoiceController::class);



