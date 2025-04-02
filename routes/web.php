<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PromotionController;
use Illuminate\Support\Facades\Route;

// Page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

// Routes pour les catégories
Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('categories.show');

// Routes pour les produits
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// Routes pour les promotions
Route::get('/promotions/{id}', [PromotionController::class, 'show'])->name('promotions.show');

// Routes pour la newsletter
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// Routes pour les pages statiques
Route::view('/about', 'pages.about')->name('pages.about');
Route::view('/contact', 'pages.contact')->name('pages.contact');
Route::view('/terms', 'pages.terms')->name('pages.terms');
Route::view('/privacy', 'pages.privacy')->name('pages.privacy');
