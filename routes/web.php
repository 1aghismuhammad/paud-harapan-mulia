<?php

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
