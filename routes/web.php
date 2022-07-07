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
//frontend route
Route::get('/',[App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('frontend.home');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// tag
Route::get('backend/tag/create',[\App\Http\Controllers\Backend\TagController::class,'create'])->name('backend.tag.create');
Route:: get('backend/tag/trash',[\App\Http\Controllers\backend\TagController::class,'trash'])->name('backend.tag.trash');
Route:: post('backend/tag/restore/{id}',[\App\Http\Controllers\backend\TagController::class,'restore'])->name('backend.tag.restore');
Route:: delete('backend/tag/force_delete/{id}',[\App\Http\Controllers\backend\TagController::class,'permanentDelete'])->name('backend.tag.force_delete');
Route:: post('backend/tag/store',[\App\Http\Controllers\Backend\TagController::class,'store'])->name('backend.tag.store');
Route::get('backend/tag',[\App\Http\Controllers\Backend\TagController::class,'index'])->name('backend.tag.index');
Route:: get('backend/tag/{id}',[\App\Http\Controllers\backend\TagController::class,'show'])->name('backend.tag.show');
Route:: delete('backend/tag/{id}',[\App\Http\Controllers\backend\TagController::class,'destroy'])->name('backend.tag.destroy');
//route to edit data
Route:: get('backend/tag/{id}/edit',[\App\Http\Controllers\backend\TagController::class,'edit'])->name('backend.tag.edit');
//route to update data
Route:: put('backend/tag/{id}',[\App\Http\Controllers\backend\TagController::class,'update'])->name('backend.tag.update');


//Brand

Route::get('backend/brand/create',[\App\Http\Controllers\Backend\BrandController::class,'create'])->name('backend.brand.create');
Route:: post('backend/brand',[\App\Http\Controllers\Backend\BrandController::class,'store'])->name('backend.brand.store');
Route::get('backend/brand',[\App\Http\Controllers\Backend\BrandController::class,'index'])->name('backend.brand.index');
Route:: get('backend/brand/{id}',[\App\Http\Controllers\backend\BrandController::class,'show'])->name('backend.brand.show');
Route:: delete('backend/brand/{id}',[\App\Http\Controllers\backend\BrandController::class,'destroy'])->name('backend.brand.destroy');
//route to edit data
Route:: get('backend/brand/{id}/edit',[\App\Http\Controllers\backend\BrandController::class,'edit'])->name('backend.brand.edit');
//route to update data
Route:: put('backend/brand/{id}',[\App\Http\Controllers\backend\BrandController::class,'update'])->name('backend.brand.update');


//Category

Route::get('backend/category/create',[\App\Http\Controllers\Backend\CategoryController::class,'create'])->name('backend.category.create');
Route:: get('backend/category/trash',[\App\Http\Controllers\backend\CategoryController::class,'trash'])->name('backend.category.trash');
Route:: post('backend/category/restore/{id}',[\App\Http\Controllers\backend\CategoryController::class,'restore'])->name('backend.category.restore');
Route:: delete('backend/category/force_delete/{id}',[\App\Http\Controllers\backend\CategoryController::class,'permanentDelete'])->name('backend.category.force_delete');
Route:: post('backend/category',[\App\Http\Controllers\Backend\CategoryController::class,'store'])->name('backend.category.store');

Route::get('backend/category',[\App\Http\Controllers\Backend\CategoryController::class,'index'])->name('backend.category.index');
Route:: get('backend/category/{id}',[\App\Http\Controllers\backend\CategoryController::class,'show'])->name('backend.category.show');
Route:: delete('backend/category/{id}',[\App\Http\Controllers\backend\CategoryController::class,'destroy'])->name('backend.category.destroy');
//route to edit data
Route:: get('backend/category/{id}/edit',[\App\Http\Controllers\backend\CategoryController::class,'edit'])->name('backend.category.edit');
//route to update data
Route:: put('backend/category/{id}',[\App\Http\Controllers\backend\CategoryController::class,'update'])->name('backend.category.update');

//sub category
Route::prefix('backend/subcategory/')->name('backend.subcategory.')->group(function (){
    Route:: get('trash', [\App\Http\Controllers\Backend\SubcategoryController::class, 'trash'])->name('trash');
    Route:: post('restore/{id}', [\App\Http\Controllers\Backend\SubcategoryController::class, 'restore'])->name('restore');
    Route:: delete('force_delete/{id}', [\App\Http\Controllers\Backend\SubcategoryController::class, 'permanentDelete'])->name('force_delete');
    Route::get('create', [\App\Http\Controllers\Backend\SubcategoryController::class, 'create'])->name('create');
    Route::post('store', [\App\Http\Controllers\Backend\SubcategoryController::class, 'store'])->name('store');
    Route::get('', [\App\Http\Controllers\Backend\SubcategoryController::class, 'index'])->name('index');
    Route:: get('{id}',[\App\Http\Controllers\backend\SubcategoryController::class,'show'])->name('show');
    Route::get('{id}/edit', [\App\Http\Controllers\Backend\SubcategoryController::class, 'edit'])->name('edit');
    Route::put('{id}', [\App\Http\Controllers\Backend\SubcategoryController::class, 'update'])->name('update');
    Route::delete('{id}', [\App\Http\Controllers\Backend\SubcategoryController::class, 'destroy'])->name('destroy');
});


//product

//Products
Route::prefix('backend/product/')->name('backend.product.')->group(function (){
    Route:: get('trash', [\App\Http\Controllers\Backend\ProductController::class, 'trash'])->name('trash');
    Route:: post('restore/{id}', [\App\Http\Controllers\Backend\ProductController::class, 'restore'])->name('restore');
    Route:: delete('force_delete/{id}', [\App\Http\Controllers\Backend\ProductController::class, 'permanentDelete'])->name('force_delete');
    Route::get('create', [\App\Http\Controllers\Backend\ProductController::class, 'create'])->name('create');
    Route::post('store', [\App\Http\Controllers\Backend\ProductController::class, 'store'])->name('store');
    Route::get('', [\App\Http\Controllers\Backend\ProductController::class, 'index'])->name('index');
    Route:: get('{id}',[\App\Http\Controllers\backend\ProductController::class,'show'])->name('show');
    Route::get('{id}/edit', [\App\Http\Controllers\Backend\ProductController::class, 'edit'])->name('edit');
    Route::put('{id}', [\App\Http\Controllers\Backend\ProductController::class, 'update'])->name('update');
    Route::delete('{id}', [\App\Http\Controllers\Backend\ProductController::class, 'destroy'])->name('destroy');
});
//option

Route::get('backend/option/create',[\App\Http\Controllers\Backend\OptionController::class,'create'])->name('backend.option.create');
Route:: post('backend/option',[\App\Http\Controllers\Backend\OptionController::class,'store'])->name('backend.option.store');
Route::get('backend/option',[\App\Http\Controllers\Backend\OptionController::class,'index'])->name('backend.option.index');
Route:: get('backend/option/{id}',[\App\Http\Controllers\backend\OptionController::class,'show'])->name('backend.option.show');
Route:: delete('backend/option/{id}',[\App\Http\Controllers\backend\OptionController::class,'destroy'])->name('backend.option.destroy');
//route to edit data
Route:: get('backend/option/{id}/edit',[\App\Http\Controllers\backend\OptionController::class,'edit'])->name('backend.option.edit');
//route to update data
Route:: put('backend/option/{id}',[\App\Http\Controllers\backend\OptionController::class,'update'])->name('backend.option.update');


//User
Route::prefix('backend/user/')->name('backend.user.')->group(function (){
    Route:: get('trash', [\App\Http\Controllers\Backend\UserController::class, 'trash'])->name('trash');
    Route:: post('restore/{id}', [\App\Http\Controllers\Backend\UserController::class, 'restore'])->name('restore');
    Route:: delete('force_delete/{id}', [\App\Http\Controllers\Backend\UserController::class, 'permanentDelete'])->name('force_delete');
    Route::get('', [\App\Http\Controllers\Backend\UserController::class, 'index'])->name('index');
    Route::post('store', [\App\Http\Controllers\Backend\SubcategoryController::class, 'store'])->name('store');
    Route:: get('{id}',[\App\Http\Controllers\backend\UserController::class,'show'])->name('show');
    Route::get('{id}/edit', [\App\Http\Controllers\Backend\UserController::class, 'edit'])->name('edit');
    Route::put('{id}', [\App\Http\Controllers\Backend\UserController::class, 'update'])->name('update');
    Route::delete('{id}', [\App\Http\Controllers\Backend\UserController::class, 'destroy'])->name('destroy');
});
