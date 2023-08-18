<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\TestimonialController;

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

Route::view('/', 'index');


Route::get('admin/login', [LoginController::class,'index'])->name('admin.login');
Route::post('admin/auth', [LoginController::class,'auth'])->name('admin.login.auth');

//route group admin
Route::group(['prefix' => 'admin', 'middleware' => 'admin.auth'], function () {
    Route::view('/', 'admin.dashboard')->name('admin.dashboard');

    Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

    //dropdown
    Route::group(['prefix' => 'dropdown'], function () {
        Route::get('/get-category', [CategoriesController::class, 'getCategory'])->name('admin.dropdown.get-category');
    });
    //route categories
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [CategoriesController::class, 'index'])->name('admin.categories');
        Route::get('/create', [CategoriesController::class, 'create'])->name('admin.categories.create');
        Route::post('/store', [CategoriesController::class, 'store'])->name('admin.categories.store');
        Route::get('/edit/{id}', [CategoriesController::class, 'edit'])->name('admin.categories.edit');
        Route::put('/update/{id}', [CategoriesController::class, 'update'])->name('admin.categories.update');
        Route::get('/destroy/{id}', [CategoriesController::class, 'destroy'])->name('admin.categories.destroy');
    });
    //route product
    Route::group(['prefix' => 'product'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.product');
        Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('admin.product.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::put('/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
        Route::get('/destroy/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
        //upload image
        Route::post('/upload-image', [ProductController::class, 'uploadImage'])->name('admin.product.upload.image');
        //admin.galleries.delete
        Route::get('/galleries/delete/{id}', [ProductController::class, 'deleteImage'])->name('admin.galleries.delete');
        //admin.galleries.set_default
        Route::get('/galleries/set-default/{id}', [ProductController::class, 'setDefault'])->name('admin.galleries.set_default');
    });
    //route blog
    Route::group(['prefix' => 'blog'], function () {
        Route::get('/', [BlogController::class, 'index'])->name('admin.blog');
        Route::get('/create', [BlogController::class, 'create'])->name('admin.blog.create');
        Route::post('/store', [BlogController::class, 'store'])->name('admin.blog.store');
        Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('admin.blog.edit');
        Route::put('/update/{id}', [BlogController::class, 'update'])->name('admin.blog.update');
        Route::get('/destroy/{id}', [BlogController::class, 'destroy'])->name('admin.blog.destroy');
    });
    //testimonial
    Route::group(['prefix' => 'testimonial'], function () {
        Route::get('/', [TestimonialController::class, 'index'])->name('admin.testimonial');
        Route::get('/create', [TestimonialController::class, 'create'])->name('admin.testimonial.create');
        Route::post('/store', [TestimonialController::class, 'store'])->name('admin.testimonial.store');
        Route::get('/edit/{id}', [TestimonialController::class, 'edit'])->name('admin.testimonial.edit');
        Route::put('/update/{id}', [TestimonialController::class, 'update'])->name('admin.testimonial.update');
        Route::get('/destroy/{id}', [TestimonialController::class, 'destroy'])->name('admin.testimonial.destroy');
    });

});
