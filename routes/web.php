<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'public.home.index')->name('home');

Route::prefix('tentang-kami')->name('about.')->group(function (): void {
    Route::view('/sejarah', 'public.about.history')->name('history');
    Route::view('/visi-misi', 'public.about.vision-mission')->name('vision-mission');
    Route::view('/fasilitas', 'public.about.facilities')->name('facilities');
});

Route::prefix('sekolah')->name('school.')->group(function (): void {
    Route::view('/paud', 'public.school.paud')->name('paud');
    Route::view('/tk', 'public.school.tk')->name('tk');
});

Route::view('/berita', 'public.news.index')->name('news.index');

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
            Route::get('/{newsPost}/edit', [NewsController::class, 'edit'])->name('edit');
            Route::put('/{newsPost}', [NewsController::class, 'update'])->name('update');
            Route::delete('/{newsPost}', [NewsController::class, 'destroy'])->name('destroy');
        });

        Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
    });
});
