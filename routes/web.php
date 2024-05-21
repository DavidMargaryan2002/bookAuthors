<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;

Route::resource('books', BookController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
Route::resource('authors', AuthorController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);







