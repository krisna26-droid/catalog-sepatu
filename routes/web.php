<?php
use App\Models\Shoe;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\ShoeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ShoeController as AdminShoeController;

Route::get('/', fn() => view('welcome'));

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // FITUR KATALOG SEPATU
    Route::prefix('shoes')->group(function () {
        Route::get('/', [ShoeController::class, 'index'])->name('user.shoes.index');

        // Halaman Detail (Show) -> URL: /shoes/{id}
        Route::get('/{id}', [ShoeController::class, 'show'])->name('user.shoes.show');
    });
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('shoes', AdminShoeController::class);
    });
});

require __DIR__ . '/auth.php';
