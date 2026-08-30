<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\NewsMediaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicNewsController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/sitemap.xml', SitemapController::class)->name('sitemap');

Route::prefix('tentang-kami')->name('about.')->group(function (): void {
    Route::view('/sejarah', 'public.about.history')->name('history');
    Route::view('/visi-misi', 'public.about.vision-mission')->name('vision-mission');
    Route::view('/fasilitas', 'public.about.facilities')->name('facilities');
});

Route::get('/sekolah-kami', [SchoolController::class, 'index'])->name('school.index');

Route::prefix('sekolah')->name('school.')->group(function (): void {
    Route::get('/paud', [SchoolController::class, 'paud'])->name('paud');
    Route::get('/tk', [SchoolController::class, 'tk'])->name('tk');
});

Route::get('/berita', [PublicNewsController::class, 'index'])->name('news.index');
Route::get('/berita/{newsPost:slug}', [PublicNewsController::class, 'show'])->name('news.show');

Route::prefix('admin')->name('admin.')->group(function (): void {
    Route::middleware('guest')->group(function (): void {
        Route::get('/login', [AuthController::class, 'create'])->name('login');
        Route::post('/login', [AuthController::class, 'store'])->name('login.store');
    });

    Route::middleware('auth')->group(function (): void {
        Route::get('/', DashboardController::class)->name('dashboard');

        Route::prefix('berita')->name('news.')->group(function (): void {
            Route::get('/', [NewsController::class, 'index'])->name('index');
            Route::get('/tambah', [NewsController::class, 'create'])->name('create');
            Route::post('/', [NewsController::class, 'store'])->name('store');
            Route::post('/media', NewsMediaController::class)->middleware('throttle:30,1')->name('media.store');
            Route::get('/{newsPost}/edit', [NewsController::class, 'edit'])->name('edit');
            Route::put('/{newsPost}', [NewsController::class, 'update'])->name('update');
            Route::delete('/{newsPost}', [NewsController::class, 'destroy'])->name('destroy');
        });

        Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
    });
});
