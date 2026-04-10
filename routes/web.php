<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\ShoeController;
use App\Http\Controllers\Admin\ShoeController as AdminShoeController;
use App\Models\Shoe; // PENTING: Import model Shoe untuk ambil data di dashboard
use Illuminate\Support\Facades\Route;

// 1. Halaman Welcome (Bisa diakses siapa saja/Public)
Route::get('/', function () {
    $latestShoes = Shoe::latest()->take(3)->get(); 
    return view('welcome', compact('latestShoes'));
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {

    // 2. Dashboard (Menampilkan 3 produk terbaru)
    Route::get('/dashboard', function () {
        $latestShoes = Shoe::latest()->take(3)->get();
        return view('dashboard', compact('latestShoes'));
    })->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 3. FITUR KATALOG SEPATU (USER)
    Route::prefix('shoes')->group(function () {
        Route::get('/', [ShoeController::class, 'index'])->name('user.shoes.index');
        Route::get('/{id}', [ShoeController::class, 'show'])->name('user.shoes.show');
    });

    // 4. FITUR ADMIN (PR-nya Dev A)
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('shoes', AdminShoeController::class);
    });
});

require __DIR__ . '/auth.php';