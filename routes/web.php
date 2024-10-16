<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Web\ProductController;
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
    // return response()->json(['message' => 'Hello Worldddd!']);
});


Route::get('/products',action: [ProductController::class,'index'])->name('items.index');
Route::get('/products/{product}',action: [ProductController::class,'show']);
Route::delete('/products/{product}',action: [ProductController::class,'delete'])->name('items.destroy');
Route::put('/products/{product}',action: [ProductController::class,'update'])->name('items.update');