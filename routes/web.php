<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', function () {
    return view('welcome');
})->name('home');


// Contact Us Routes
Route::get('/contact-us', [ContactController::class, 'showForm'])->name('contact.form'); // Show contact form
Route::post('/contact-us', [ContactController::class, 'submitForm'])->name('contact.submit'); // Handle form submission


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

// User Routes
Route::middleware(['auth', 'userMiddleware'])->group(function() {
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('favorite', [FavoriteController::class, 'index'])->name('user.favorite');
});

// Admin Routes
Route::middleware(['auth', 'adminMiddleware'])->group(function() {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Article Management
    Route::get('/admin/admin/articles', [AdminController::class, 'articles'])->name('admin.articles'); // View all articles
    Route::get('/admin/articles/create', [AdminController::class, 'createArticle'])->name('admin.articles.create'); // Form to create an article
    Route::post('/admin/articles', [AdminController::class, 'storeArticle'])->name('admin.articles.store'); // Save a new article
    Route::get('/admin/articles/{article}/edit', [AdminController::class, 'editArticle'])->name('admin.articles.edit'); // Form to edit an article
    Route::patch('/admin/articles/{article}', [AdminController::class, 'updateArticle'])->name('admin.articles.update'); // Update an article
    Route::delete('/admin/articles/{article}', [AdminController::class, 'deleteArticle'])->name('admin.articles.delete'); // Delete an article

    // User Management
    Route::get('/admin/admin/users', [AdminController::class, 'listUsers'])->name('admin.users'); // View all users
    Route::get('/admin/users/create', [AdminController::class, 'createUser'])->name('admin.users.create'); // Form to create a user
    Route::post('/admin/users', [AdminController::class, 'storeUser'])->name('admin.users.store'); // Save a new user
    Route::get('/admin/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit'); // Form to edit a user
    Route::patch('/admin/users/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update'); // Update a user
    Route::delete('/admin/users/{user}', [AdminController::class, 'deleteUser'])->name('admin.users.delete'); // Delete a user
});
