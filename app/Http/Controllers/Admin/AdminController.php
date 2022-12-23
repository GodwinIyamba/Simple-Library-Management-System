<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\AuthorStoreRequest;
use App\Http\Requests\BookCopyStoreRequest;
use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Http\Requests\UpdateBookCopyRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Copy;
use App\Models\Lend;
use App\Models\Log;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminLoginView()
    {
        return view('admin.auth.login');
    }

    public function adminLogin(AdminLoginRequest $request)
    {
        if(Auth::guard('admin')->attempt($request->validated())){
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin.login');
    }

    public function adminDashboard()
    {
        $books_count = Book::total();
        $authors_count = Author::total();
        $books_copy_count = Copy::total();
        $categories_count = Category::total();
        $pending_books_count = Lend::where('status', 1)->count();
        $returned_books_count = Log::where('status', 3)->count();
        $borrowed_books_count = Lend::where('status', 0)->count();
        $rejected_books_count = Log::where('status', 4)->count();
        return view('admin.sections.dashboard', compact('books_count', 'authors_count', 'books_copy_count', 'categories_count', 'pending_books_count', 'returned_books_count', 'borrowed_books_count', 'rejected_books_count'));
    }

    //CATEGORY METHOD

    public function adminCategory()
    {
        $categories = Category::with(['books'])->paginate(15);
        return view('admin.sections.category.category_list', compact('categories'));
    }

    public function adminAddCategory()
    {
        return view('admin.sections.category.category_add');
    }

    public function adminStoreCategory(CategoryStoreRequest $request)
    {
        Category::create($request->validated());

        return back();
    }

    public function adminEditCategory(Category $category)
    {
        return view('admin.sections.category.category_edit', compact('category'));
    }

    public function adminUpdateCategory(UpdateCategoryRequest $request, $category)
    {
        $category = Category::findOrFail($category);

        $category->update($request->validated());

        return redirect()->route('admin.category');
    }

    public function adminDeleteCategory(Category $category)
    {
        if ($category->books->count() >= 1) {
            return back();
        }

        $category->delete();
    }

    //AUTHOR METHODS
    public function adminAuthor()
    {
        $authors = Author::with(['books'])->paginate(20);
        return view('admin.sections.author.author_list', compact('authors'));
    }

    public function adminAddAuthor()
    {
        return view('admin.sections.author.author_add');
    }

    public function adminStoreAuthor(AuthorStoreRequest $request)
    {
        Author::create($request->validated());

        return back();
    }

    public function adminEditAuthor(Author $author)
    {
        return view('admin.sections.author.author_edit', compact('author'));
    }

    public function adminUpdateAuthor(UpdateAuthorRequest $request, $author)
    {
        $author = Author::findOrFail($author);

        $author->update($request->validated());

        return redirect()->route('admin.author');
    }

    public function adminDeleteAuthor(Author $author)
    {
        if ($author->books->count() >= 1) {
            return back();
        }

        $author->delete();
    }

    //BOOK METHODS
    public function adminBook()
    {
        $books = Book::with(['category', 'author'])->paginate(50);
        return view('admin.sections.book.book_list', compact('books'));
    }

    public function adminAddBook()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.sections.book.book_add', compact('authors', 'categories'));
    }

    public function adminStoreBook(BookStoreRequest $request)
    {
        $validated = $request->validated();

        $book = Book::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'isbn' => $request['isbn'],
            'edition' => $request['edition'],
            'author_id' => $request['author_id'],
            'category_id' => $request['category_id'],
        ]);

        if($request->hasFile('book_cover')) {
            $book_cover = $request->file('book_cover');
            $cover_name = $book_cover->getClientOriginalName();
            $file_path = 'storage/book_covers/' . $book->id . '/' . $cover_name;
            $book_cover->storeAs('book_covers/' . $book->id, $cover_name,'public');
            $book->update([
                'book_cover' => $file_path,
            ]);
        }

        return back();
    }

    public function adminEditBook(Book $book)
    {
        $categories = Category::with('books')->get();
        $authors = Author::all();

        return view('admin.sections.book.book_edit', compact('book', 'categories', 'authors'));
    }

    public function adminUpdateBook(UpdateBookRequest $request, $book)
    {
        $book = Book::findOrFail($book);

        $book->update([
            'title' => $request->title,
            'description' => $request->description,
            'isbn' => $request->isbn,
            'edition' => $request->edition,
            'author_id' => $request->author_id,
            'category_id' => $request->category_id,
        ]);

        if($request->hasFile('book_cover')) {
            unlink($book->book_cover);

            $book_cover = $request->file('book_cover');
            $cover_name = $book_cover->getClientOriginalName();
            $file_path = 'storage/book_covers/' . $book->id . '/' . $cover_name;
            $book_cover->storeAs('book_covers/' . $book->id, $cover_name,'public');
            $book->update([
                'book_cover' => $file_path,
            ]);
        }

        return redirect()->route('admin.book');
    }

    public function adminDeleteBook(Book $book)
    {
        if ($book->copies->count() >= 1) {
            return back();
        }

        $book->delete();
    }

    //BOOK COPIES
    public function adminBookCopies()
    {
        $copies = Copy::paginate(20);
        return view('admin.sections.book.book_copy_list', compact('copies'));
    }

    public function adminAddBookCopy()
    {
        $books = Book::all();
        return view('admin.sections.book.book_copy_add', compact('books'));
    }

    public function adminStoreBookCopy(BookCopyStoreRequest $request)
    {
        Copy::create($request->validated());
        return back();
    }

    public function adminEditBookCopy(Copy $copy)
    {
        $books = Book::all();
        return view('admin.sections.book.book_copy_edit', compact('copy', 'books'));
    }

    public function adminUpdateBookCopy(UpdateBookCopyRequest $request, $copy)
    {

        $copy = Copy::findOrFail($copy);

        $copy->update($request->validated());

        return redirect()->route('admin.book_copies');
    }

    public function adminDeleteBookCopy(Copy $copy)
    {
        if ($copy->status == 1) {
            return back();
        }

        $copy->delete();
    }

    //BORROWED BOOKS
    public function adminBorrowedBooks()
    {
        $books = Lend::where('status', 0)->paginate(10);
        return view('admin.sections.book.borrowed_books', compact('books'));
    }

    //PENDING BOOKS
    public function adminPendingBooks()
    {
        $books = Lend::where('status', 1)->paginate(20);
        return view('admin.sections.book.pending_books', compact('books'));
    }

    //RETURED BOOKS
    public function adminReturnedBooks()
    {
        $books = Log::where('status', 3)->paginate(20);
        return view('admin.sections.book.returned_books', compact('books'));
    }

    //LOG BOOKS
    public function adminLogBooks(Book $book)
    {
        $books = Log::paginate(20);
        return view('admin.sections.book.log_books', compact('books'));
    }


    public function adminAcceptBook(Lend $book)
    {
        $book->update([
            'status' => 2
        ]);

        Copy::findOrFail($book->copy_id)->update([
            'status' => 0,
        ]);

        Log::create([
            'user_id' => $book->user_id,
            'copy_id' => $book->copy_id,
            'date' => Carbon::now()->toDateString(),
            'status' => 3,
        ]);

        return back();
    }

    //LOGOUT

    public function adminLogout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }
}
