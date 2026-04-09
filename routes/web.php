<?php
use App\Models\Shoe;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\ShoeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $latestShoes = Shoe::latest()->take(3)->get();
    return view('dashboard', compact('latestShoes'));
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/dashboard', function () {
        return redirect()->route('home');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // FITUR KATALOG SEPATU
    Route::prefix('shoes')->group(function () {
        Route::get('/', [ShoeController::class, 'index'])->name('user.shoes.index');
        Route::get('/{shoe}', [ShoeController::class, 'show'])->name('user.shoes.show');
    });
});

require __DIR__.'/auth.php';
