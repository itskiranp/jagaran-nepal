<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ThematicAreaController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\NewsController;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// About Us routes
Route::prefix('about')->group(function () {
    Route::get('/', [AboutController::class, 'index'])->name('about');
    Route::get('/team', [TeamController::class, 'index'])->name('team');
    Route::get('/alumni', [AlumniController::class, 'index'])->name('alumni');
});

// Publication routes
Route::prefix('publications')->group(function () {
    Route::get('/resources', [ResourceController::class, 'index'])->name('resources');
    Route::get('/blog', [BlogController::class, 'index'])->name('blog.list');
    Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
    Route::get('/reports', [ReportController::class, 'index'])->name('reports');
});

// Thematic Areas

Route::prefix('thematic-areas')->group(function () {
    Route::get('/thematic-areas', [ThematicAreaController::class, 'index'])->name('thematic-areas.index');
    Route::get('/thematic-areas/{slug}', [ThematicAreaController::class, 'show'])->name('thematic-area.show');
});


// Other pages
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/career', [CareerController::class, 'index'])->name('career');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/donate', [DonateController::class, 'index'])->name('donate');

// Newsletter subscription
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])
    ->name('newsletter.subscribe');
    

    // Add this with your other routes
Route::prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('news.list');
    Route::get('/{slug}', [NewsController::class, 'show'])->name('news.show');
});

// Contact form submission
Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');