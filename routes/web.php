<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [HomeController::class, 'index'])->name('home');
//Route::get('/product/{product}', [ProductController::class, 'show'])->name('product');
Route::get('/product/{product:slug}', [ProductController::class, 'show'])->name('product');

/*
|--------------------------------------------------------------------------
| RODA DE ADMIN
|--------------------------------------------------------------------------
*/
Route::get('admin/products', [AdminProductController::class, 'index'])->name('admin.products');
Route::get('admin/products/create', [AdminProductController::class, 'create'])->name('admin.product.create');
Route::post('admin/products', [AdminProductController::class, 'store'])->name('admin.product.store');

Route::get('admin/products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.product.edit');
Route::put('admin/products/{product}', [AdminProductController::class, 'update'])->name('admin.product.update');

//Route::get('admin/products/{product}/delete', [AdminProductController::class, 'destroy'])->name('admin.product.destroy');
//Neste caso, é preciso modificar a view, mudando link p/ um botão, e aí acrescentar:: 
//  @csrf   e   @method('delete')
//  no <FOMRM></FOMRM> passar como method="POST"   e   no  ACTION a ROTA destroy.
Route::delete('admin/products/{product}', [AdminProductController::class, 'destroy'])->name('admin.product.destroy');
Route::get('admin/products/{product}/delete-image', [AdminProductController::class, 'destroyImage'])->name('admin.product.destroyImage');