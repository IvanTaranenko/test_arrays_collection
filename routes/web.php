<?php

use App\Http\Controllers\PDFController;
use App\Http\Controllers\UserController;
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


Route::get('/', [UserController::class, 'index']);
Route::get('/test2', [UserController::class, 'test2']);

//
//Route::get('/downloadPDF/{id}',[\App\Http\Controllers\DisneyplusController::class,'downloadPDF']);
//
//Route::get('disneyplus/list', [\App\Http\Controllers\DisneyplusController::class,'index'])->name('disneyplus.index');
//
//Route::get('/', [\App\Http\Controllers\DisneyplusController::class,'create'])->name('disneyplus.create');
//Route::post('/', [\App\Http\Controllers\DisneyplusController::class,'store'])->name('disneyplus.store');
