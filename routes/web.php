<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\AdminRentalController;
use App\Http\Middleware\IsAdmin;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/films', [FilmController::class, 'index'])->name('films.index');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::middleware(['auth'])->group(function () {

    Route::get('/checkout/add/{film}', [RentalController::class, 'addToCheckout'])->name('checkout.add');
    Route::get('/checkout/remove/{film}', [RentalController::class, 'removeFromCheckout'])->name('checkout.remove');
    Route::get('/checkout', [RentalController::class, 'checkout'])->name('rentals.checkout');
    Route::post('/checkout/store', [RentalController::class, 'store'])->name('rentals.store');
    Route::get('/checkout/success', [RentalController::class, 'success'])->name('rentals.success');

    Route::post('/films/{film}/review', [ReviewController::class, 'store'])->name('films.review');
    Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
    Route::put('/reviews/{review}', [ReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

    Route::middleware([IsAdmin::class])->prefix('admin')->group(function () {
        Route::get('/films/create', [FilmController::class, 'create'])->name('films.create');
        Route::post('/films', [FilmController::class, 'store'])->name('films.store');
        Route::get('/films/{film}/edit', [FilmController::class, 'edit'])->name('films.edit');
        Route::put('/films/{film}', [FilmController::class, 'update'])->name('films.update');
        Route::delete('/films/{film}', [FilmController::class, 'destroy'])->name('films.destroy');

        Route::get('/rentals', [AdminRentalController::class, 'index'])->name('admin.rentals.index');
        Route::get('/rentals/top', [AdminRentalController::class, 'topMovies'])->name('admin.rentals.top');
    });
});
