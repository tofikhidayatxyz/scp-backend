<?php

use App\Http\Controllers\Public\PublicController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/book', [PublicController::class, 'book'])->name('book');
Route::get('/book/detail/{slug}', [PublicController::class, 'detail'])->name('book.detail');


// Route for book category admin
// group admin prefix

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function() {
    // Route::get('/', 'Admin\BookController@create')->name('index');
    Route::get('/', [App\Http\Controllers\Admin\BookController::class, 'index'])->name('index');
    Route::resource('book-category', App\Http\Controllers\Admin\BookCategoryController::class, ['names' => 'book-category']);
    Route::resource('book', App\Http\Controllers\Admin\BookController::class, ['names' => 'book']);
});


Route::get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
