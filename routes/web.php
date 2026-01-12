<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt; 

use App\Livewire\Products\Home as ProductHome;
use App\Livewire\Products\Business as ProductBusiness;
use App\Livewire\Partnership;

// 1. BERANDA UTAMA
Route::get('/', function () {
    return view('pages.home'); 
})->name('home');

// 2. GROUP PROFILE
Route::prefix('profile')->name('profile.')->group(function () {
    Route::view('tentang-kami', 'pages.profile.about')->name('about');
    Route::view('struktur-organisasi', 'pages.profile.structure')->name('structure');
});

// 3. GROUP PRODUK
Route::prefix('produk')->name('products.')->group(function () {
    Route::get('home', ProductHome::class)->name('home');
    Route::get('business', ProductBusiness::class)->name('business');
});

// 4. MENU LAINNYA
Route::get('partnership', Partnership::class)->name('partnership');
Route::view('area-jangkauan', 'pages.coverage')->name('coverage');
Route::view('kontak', 'pages.contact')->name('contact');

// 5. GROUP ADMIN
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard Utama
    Route::view('dashboard', 'dashboard')->name('dashboard');

    // Group Kelola Data
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::view('packages', 'admin.packages.index')->name('packages');
        Route::view('partners', 'admin.partners.index')->name('partners');
        Route::view('messages', 'admin.messages.index')->name('messages');
    });
});

// 6. PROFILE MANAGEMENT
Route::middleware('auth')->group(function () {
    Volt::route('/profile', 'profile.edit')->name('profile.edit');
});


require __DIR__.'/auth.php';