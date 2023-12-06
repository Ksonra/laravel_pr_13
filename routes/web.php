<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use Faker\Provider\Base;


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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('products', [Controllers\ProductController::class, 'getIndex']);
Route::get('allproducts', [Controllers\ProductController::class, 'getAll']);
Route::get('/',[Controllers\BaseController::class, 'getIndex']);
Route::get('catalog/{catalog}', [Controllers\CatalogController::class,'getIndex']); //делаем страницу с каталогом
Route::get('product/{product}', [Controllers\ProductController::class, 'getOne']);
Route::get('blog', [Controllers\BlogController::class, 'getIndex']);
Route::get('feed', [Controllers\FeedController::class, 'getIndex']);
// Route::get('search', [Controllers\ProductController::class, 'getIndex']);
Route::get('blog/{blog}', [Controllers\BlogController::class, 'getOne']);
Route::get('add_cart/{id}', [Controllers\OrderController::class, 'addCookie']);
Route::get('cart', [Controllers\OrderController::class, 'cart'])->name('cart');
Route::get('cart/delete/{product}', [Controllers\OrderController::class, 'cartDelete']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';

// всегда в конце конкретно этот !!!

Route::get('{url}', [Controllers\BaseController::class, 'getMaintext']);
