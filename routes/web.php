<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/blog', [PostController::class, 'archive'])->name('posts.archive');

// 4. Middleware مخصص يمنع الوصول بدون تسجيل دخول
Route::middleware(['auth'])->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::resource('posts', PostController::class);
});
// ===== Portal Routes =====
Route::view('/', 'portal.index');
Route::view('/glm', 'portal.glm');
Route::view('/gemini', 'portal.gemini');
Route::view('/deepseek', 'portal.deepseek');
Route::view('/kimi', 'portal.kimi');
