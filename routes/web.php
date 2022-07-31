<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Sub_catagoryController;
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
})->name('home');

Route::get('/dashboard', function () {
    return view('layouts.home');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
// Route::get('/', [CategoryController::class, 'index'])->middleware(['auth']);
Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

// __sub category__//
Route::get('/subcategory/create', [Sub_catagoryController::class, 'create'])->name('subcategory.create');
Route::post('/subcategory/store', [Sub_catagoryController::class, 'store'])->name('subcategory.store');
Route::get('/subcategory/index', [Sub_catagoryController::class, 'index'])->name('subcategory.index');
Route::get('/subcategory/delete/{id}', [Sub_catagoryController::class, 'destroy'])->name('subcategory.delete');
Route::get('/subcategory/edit/{id}', [Sub_catagoryController::class, 'edit'])->name('subcategory.edit');
Route::post('/subcategory/update/{id}', [Sub_catagoryController::class, 'update'])->name('subcategory.update');

//__post__//
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
Route::get('/post/index', [PostController::class, 'index'])->name('post.index');
Route::get('/post/delete/{id}', [PostController::class, 'destroy'])->name('post.delete');
Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
Route::post('/post/update/{id}', [PostController::class, 'update'])->name('post.update');
