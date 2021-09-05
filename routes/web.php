<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__ . '/auth.php';

/**
 * Books
 */
// list
Route::get('/', [BookController::class, 'index']);

// Login required
Route::middleware(['auth'])->group(function () {
  // create
  Route::get('/books/create', [BookController::class, 'create']);
  Route::post('/books', [BookController::class, 'store']);

  // edit
  Route::get('/books/{book}/edit', [BookController::class, 'edit']);
  Route::patch('/books/{book}', [BookController::class, 'update']);

  // delete
  Route::delete('/books/{book}', [BookController::class, 'destroy']);
});

// single
Route::get('/books/{book}', [BookController::class, 'show']);


/**
 * Categories
 */
// single
Route::get('/categories/{category}', [CategoryController::class, 'show']);


/**
 * Authoe
 */
// single
Route::get('/authors/{author}', [AuthorController::class, 'show']);
