<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\ShoeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // FITUR KATALOG SEPATU
    Route::prefix('shoes')->group(function () {
        // Halaman Katalog (Index) -> URL: /shoes
        Route::get('/', [ShoeController::class, 'index'])->name('user.shoes.index');
        
        // Halaman Detail (Show) -> URL: /shoes/{id}
        Route::get('/{id}', [ShoeController::class, 'show'])->name('user.shoes.show');
    });
});

require __DIR__.'/auth.php';
