<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/contact-us', function () {
    return view('contact');
})->name('contact');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//user routes
Route::middleware(['auth', 'userMiddleware'])->group(function(){

    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('favorite',[FavoriteController::class,'index'])->name('user.favorite');
});

//admin routes
Route::middleware(['auth', 'adminMiddleware'])->group(function(){


    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

});
