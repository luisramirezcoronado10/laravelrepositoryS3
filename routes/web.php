<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

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

Route::get('/',[ImageController::class,'index']);
Route::post('/',[ImageController::class,'store'])->name('store.image');
Route::get('delete/{id}',[ImageController::class,'delete'])->name('delete.image');
