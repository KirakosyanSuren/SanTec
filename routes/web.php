<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;

use App\Http\Controllers\Admin\BrandController as AdminBrandController;
use App\Http\Controllers\Admin\AboutController as AdminAboutController;
use App\Http\Controllers\Admin\StatisticsController as AdminStatisticsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ModelController as AdminModelController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;

use Illuminate\Support\Facades\Route;


Route::redirect('/', '/hy/');
Route::redirect('/admin', '/hy/admin/login');

Route::prefix('{locale}')
    ->middleware('set.locale')
    ->group(function () {

        Route::get('/', [HomeController::class, 'index'])->name('home.index');
        Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
        Route::get('/product/{name}', [InventoryController::class, 'show'])->name('inventory.show');
        Route::get('/brands', [BrandController::class, 'index'])->name('brand.index');
        Route::get('/brand/{slug}', [BrandController::class, 'show'])->name('brand.show');
        Route::get('/about-us', [AboutController::class, 'index'])->name('about.index');
        Route::get('/contact-us', [ContactController::class, 'index'])->name('contact.index');

        Route::post('/feedback', [ContactController::class, 'feedback'])->name('feedback');

        Route::prefix('admin')
            ->name('admin.')
            ->group(function () {

                Route::middleware('guest')->group(function () {

                    Route::get('/login', [AuthController::class, 'showLogin'])
                        ->name('login.show');

                    Route::post('/login', [AuthController::class, 'login'])
                        ->name('login');
                });

                Route::middleware('auth')->group(function () {
                    Route::post('/logout', [AuthController::class, 'logout'])
                        ->name('logout');

                    Route::get('/', [DashboardController::class, 'index'])
                        ->name('dashboard.index');

                    Route::delete('/feedback/{feedback}', [DashboardController::class, 'feedback_destroy'])
                        ->name('feedback.destroy');

                    Route::patch('/feedback/{feedback}/status', [DashboardController::class, 'feedback_changeStatus'])
                        ->name('feedback.changeStatus');

                    Route::resource('/brands', AdminBrandController::class)
                        ->except(['show']);

                    Route::patch('/brands/{brand}/status', [AdminBrandController::class, 'changeStatus'])
                        ->name('brands.changeStatus');

                    Route::resource('/categories', AdminCategoryController::class)
                        ->except(['show', 'destroy']);

                    Route::get('/categories/by-brand/{brand}', [AdminCategoryController::class, 'findByBrand'])
                        ->name('admin.categories.by-brand');

                    Route::patch('/categories/{category}/status', [AdminCategoryController::class, 'changeStatus'])
                        ->name('categories.changeStatus');

                    Route::resource('/products', AdminProductController::class)
                        ->except(['show', 'destroy']);

                    Route::patch('/products/{product}/status', [AdminProductController::class, 'changeStatus'])
                        ->name('products.changeStatus');

                    Route::resource('/models', AdminModelController::class)
                        ->except(['show']);

                    Route::resource('/about', AdminAboutController::class)
                        ->only(['index', 'update']);

                    Route::resource('/statistics', AdminStatisticsController::class)
                        ->except(['show']);

                    Route::patch('/statistics/{statistic}/status', [AdminStatisticsController::class, 'changeStatus'])
                        ->name('statistics.changeStatus');

                    Route::resource('/contact', AdminContactController::class)
                        ->only(['index', 'update']);

                });

            });

    });
