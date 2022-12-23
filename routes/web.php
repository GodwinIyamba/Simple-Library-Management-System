<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
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
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [IndexController::class, 'userProfile'])->name('dashboard');
    Route::post('/borrow-book', [IndexController::class, 'borrowBook'])->name('borrow_book');
    Route::get('/settings', [IndexController::class, 'userSettings'])->name('user_settings');
    Route::post('/update', [IndexController::class, 'userUpdate'])->name('user.update');
    Route::get('/return-book/{book}', [IndexController::class, 'returnBook'])->name('return_book');
});

Route::get('/', [IndexController::class, 'homeView'])->name('home');
Route::get('/about', [IndexController::class, 'aboutView'])->name('about');
Route::get('/book-details/{book}', [IndexController::class, 'bookDetails'])->name('book_details');

Route::namespace('Admin')->prefix('admin')->as('admin.')->group(function(){
    Route::get('/login', [AdminController::class, 'adminLoginView'])->name('login');
    Route::post('/login', [AdminController::class, 'adminLogin'])->name('access');

    Route::middleware('admin')->group(function(){
        //DASHBOARD ROUTE
        Route::get('/dashboard', [AdminController::class, 'adminDashboard'])->name('dashboard');

        //CATEGORY ROUTES
        Route::get('/category', [AdminController::class, 'adminCategory'])->name('category');
        Route::get('/add-category', [AdminController::class, 'adminAddCategory'])->name('add_category');
        Route::post('/store-category', [AdminController::class, 'adminStoreCategory'])->name('store_category');
        Route::get('/edit-category/{category}', [AdminController::class, 'adminEditCategory'])->name('edit_category');
        Route::post('/update-category/{category}', [AdminController::class, 'adminUpdateCategory'])->name('update_category');
        Route::get('/delete-category/{category}', [AdminController::class, 'adminDeleteCategory'])->name('delete_category');

        //AUTHOR ROUTES
        Route::get('/author', [AdminController::class, 'adminAuthor'])->name('author');
        Route::get('/add-author', [AdminController::class, 'adminAddAuthor'])->name('add_author');
        Route::post('/store-author', [AdminController::class, 'adminStoreAuthor'])->name('store_author');
        Route::get('/edit-author/{author}', [AdminController::class, 'adminEditAuthor'])->name('edit_author');
        Route::post('/update-author/{author}', [AdminController::class, 'adminUpdateAuthor'])->name('update_author');
        Route::get('/delete-author/{author}', [AdminController::class, 'adminDeleteAuthor'])->name('delete_author');

        //BOOK ROUTES
        Route::get('/book', [AdminController::class, 'adminBook'])->name('book');
        Route::get('/book-copies', [AdminController::class, 'adminBookCopies'])->name('book_copies');
        Route::get('/add-book', [AdminController::class, 'adminAddBook'])->name('add_book');
        Route::get('/add-book-copy', [AdminController::class, 'adminAddBookCopy'])->name('add_book_copy');
        Route::post('/store-book', [AdminController::class, 'adminStoreBook'])->name('store_book');
        Route::post('/store-book-copy', [AdminController::class, 'adminStoreBookCopy'])->name('store_book_copy');
        Route::get('/edit-book-copy/{copy}', [AdminController::class, 'adminEditBookCopy'])->name('edit_book_copy');
        Route::post('/update-book-copy/{copy}', [AdminController::class, 'adminUpdateBookCopy'])->name('update_book_copy');
        Route::get('/delete-book-copy/{copy}', [AdminController::class, 'adminDeleteBookCopy'])->name('delete_book_copy');
        Route::get('/borrowed-books', [AdminController::class, 'adminBorrowedBooks'])->name('borrowed_books');
        Route::get('/pending-books', [AdminController::class, 'adminPendingBooks'])->name('pending_books');
        Route::get('/returned-books', [AdminController::class, 'adminReturnedBooks'])->name('returned_books');
        Route::get('/log-books', [AdminController::class, 'adminLogBooks'])->name('log_books');
        Route::get('/accept-book/{book}', [AdminController::class, 'adminAcceptBook'])->name('accept_book');
        Route::get('/edit-book/{book}', [AdminController::class, 'adminEditBook'])->name('edit_book');
        Route::post('/update-book/{book}', [AdminController::class, 'adminUpdateBook'])->name('update_book');
        Route::get('/delete-book/{book}', [AdminController::class, 'adminDeleteBook'])->name('delete_book');

        //LOGOUT
        Route::post('/logout', [AdminController::class, 'adminLogout'])->name('logout');
    });
});


