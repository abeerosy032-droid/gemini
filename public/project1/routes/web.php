<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| المسارات العامة — واجهة القراء
|--------------------------------------------------------------------------
*/

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

/*
|--------------------------------------------------------------------------
| لوحة التحكم — تتطلب تسجيل دخول + صلاحية
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', \App\Http\Middleware\EnsureDashboardAccess::class])
    ->prefix('dashboard')
    ->name('dashboard.')
    ->group(function () {

        Route::get('/posts', [PostController::class, 'dashboard'])
            ->name('posts.index');

        Route::get('/posts/create', [PostController::class, 'create'])
            ->name('posts.create');

        Route::post('/posts', [PostController::class, 'store'])
            ->name('posts.store');

        Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
            ->name('posts.edit');

        Route::get('/posts/{post}', [PostController::class, 'show'])
            ->name('posts.show');

        Route::put('/posts/{post}', [PostController::class, 'update'])
            ->name('posts.update');

        Route::delete('/posts/{post}', [PostController::class, 'destroy'])
            ->name('posts.destroy');
    });
