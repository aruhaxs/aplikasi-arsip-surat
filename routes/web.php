<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\KategoriController;

Route::get('/', [SuratController::class, 'index'])->name('home');

Route::resource('surat', SuratController::class);

Route::get('surat/{surat}/download', [SuratController::class, 'download'])->name('surat.download');
Route::view('/about', 'about')->name('about');
Route::resource('kategori', KategoriController::class);