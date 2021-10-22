<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\ExceptionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;

/**
 * Application routes.
 */
Route::any('front', [HomeController::class, 'index']);

/**
 * Generic Pages
 */
Route::any('blog', [ArchiveController::class, 'index']);
Route::any('archive', [ArchiveController::class, 'index']);
Route::any('single', [PostController::class, 'index']);
Route::any('page', [PageController::class, 'index']);
Route::any('singular', [PostController::class, 'index']);

/*
 * Regular & fallback pages
 */

Route::any('search', [SearchController::class, 'index']);
Route::fallback([ExceptionController::class, 'index']);
