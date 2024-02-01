<?php

use App\Http\Controllers\ProductController;
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

Route::get('/',[ProductController::class,'index']);


Route::get('products',[ProductController::class,'index']);

Route::post('store-single-product-tags',[ProductController::class,'storeProductTags'])->name('store.product.tags');

Route::post('store-product-tags',[ProductController::class,'storeTags'])->name('store.tags');

Route::get('product/{product_id}/tags',[ProductController::class,'getProductTags']);


